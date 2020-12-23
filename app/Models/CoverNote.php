<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class CoverNote extends Model
{
    use UuidTrait;

    protected $fillable = [
		'serial_no',
		'issuing_office_id',
		'policy_type_id',
		'insured_bank_address',
		'insured_bank_account_name',
		'insured_address',
		'interest_covered',
		'voyage_from',
		'voyage_to',
		'voyage_via',
		'carriage_id',
		'amount_insured_usd',
		'amount_insured_tolerance',
		'usd_to_bdt_rate',
		'amount_insured_bdt',
		'period_starts',
		'period_ends',
		'mr_no',
		'tariff',
		'net_premium_bdt',
		'vat_rate',
		'vat_amount_bdt',
		'stamp_duty_bdt',
		'total_premium_bdt',
		'issued_by'
    ];

    public function branch()
    {
    	return $this->belongsTo(Branch::class, 'issuing_office_id');
    }

    public function policyType()
    {
    	return $this->belongsTo(PolicyType::class);
    }

    public function transits()
    {
    	return $this->belongsToMany(Transit::class);
    }

    public function carriage()
    {
    	return $this->belongsTo(Carriage::class);
    }

    public function risks()
    {
    	return $this->belongsToMany(Risk::class);
    }

    public function issuer()
    {
    	return $this->belongsTo(User::class, 'issued_by');
    }

    public function getRisksFromInput($input)
    {
        $pattern = "/^risk/";
        $risks = array_intersect_key($input, array_flip(preg_grep($pattern, array_keys($input))));

        return $risks;
    }

    public function getTransitsFromInput($input)
    {
        $pattern = "/^transit/";
        $transits = array_intersect_key($input, array_flip(preg_grep($pattern, array_keys($input))));

        return $transits;
    }

    public function calculateTariff($risks)
    {
    	$tariff = 0;
    	foreach ($risks as $risk)
    	{
	    	$risk = Risk::findOrFail($risk);
	    	$tariff = $tariff + $risk->tariff;
    	}

    	return $tariff;
    }

    public function prepareDataForInsertion($request)
    {
        $amount_insured_bdt = 
        (
            $request->input('amount_insured_usd') + 
            (
                $request->input('amount_insured_usd') * ($request->input('amount_insured_tolerance') / 100)
            )
        ) * 
        $request->input('usd_to_bdt_rate');

        $input = $request->except('_token', '_method');
        $risks = $this->getRisksFromInput($input);
        $transits = $this->getTransitsFromInput($input);
        $tariff = $this->calculateTariff($risks);
        $net_premium_bdt = $amount_insured_bdt * ($tariff / 100);
        $vat_amount_bdt = $net_premium_bdt * ($request->input('vat_rate') / 100);
        $total_premium_bdt = ceil($net_premium_bdt + $vat_amount_bdt + $request->input('stamp_duty_bdt'));

        return [
            'risks' => $risks,
            'transits' => $transits,
            'dataToInsert' => [
                'id' => Str::uuid(),
                'issuing_office_id' => $request->input('issuing_office_id'),
                'insured_bank_address' => $request->input('insured_bank_address'),
                'insured_bank_account_name' => $request->input('insured_bank_account_name'),
                'insured_address' => $request->input('insured_address'),
                'interest_covered' => $request->input('interest_covered'),
                'voyage_from' => $request->input('voyage_from'),
                'voyage_to' => $request->input('voyage_to'),
                'voyage_via' => $request->input('voyage_via'),
                'carriage_id' => $request->input('carriage_id'),
                'amount_insured_usd' => $request->input('amount_insured_usd'),
                'amount_insured_tolerance' => $request->input('amount_insured_tolerance'),
                'usd_to_bdt_rate' => $request->input('usd_to_bdt_rate'),
                'amount_insured_bdt' => $amount_insured_bdt,
                'tk_in_word' => $request->input('tk_in_word'),
                'period_starts' => $request->input('period_starts'),
                'period_ends' => $request->input('period_ends'),
                'mr_no' => $request->input('mr_no'),
                'tariff' => $tariff,
                'net_premium_bdt' => $net_premium_bdt,
                'vat_rate' => $request->input('vat_rate'),
                'vat_amount_bdt' => $vat_amount_bdt,
                'stamp_duty_bdt' => $request->input('stamp_duty_bdt'),
                'total_premium_bdt' => $total_premium_bdt,
                'issued_by' => auth()->user()->id
            ]
        ];
    }
}

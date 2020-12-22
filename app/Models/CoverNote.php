<?php

namespace App\Models;

use App\Traits\UuidTrait;
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
    	return $this->belongsTo(Branch::class);
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
    	return $this->belongsTo(Carraige::class);
    }

    public function risks()
    {
    	return $this->belongsToMany(Risk::class);
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
}

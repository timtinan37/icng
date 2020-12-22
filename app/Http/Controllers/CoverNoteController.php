<?php

namespace App\Http\Controllers;

use App\Models\CoverNote;
use App\Models\Branch;
use App\Models\Carriage;
use App\Models\Risk;
use App\Models\Transit;
use App\Http\Requests\CoverNoteRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{
    View,
    Redirect
};

class CoverNoteController extends Controller
{
    private $branch;
    private $carriage;
    private $coverNote;
    private $risk;
    private $transit;

    function __construct(CoverNote $coverNote, Branch $branch, Carriage $carriage, Risk $risk, Transit $transit)
    {
        $this->branch = $branch;
        $this->carriage = $carriage;
        $this->coverNote = $coverNote;
        $this->risk = $risk;
        $this->transit = $transit;

        $this->authorizeResource(CoverNote::class, 'coverNote');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = $this->branch->all();
        $carriages = $this->carriage->all();
        $risks = $this->risk->all();
        $transits = $this->transit->all();

        return View::make('cover-notes.create', compact('branches', 'carriages', 'risks', 'transits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CoverNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoverNoteRequest $request)
    {
        $amount_insured_bdt = 
        (
            request('amount_insured_usd') + 
            (
                request('amount_insured_usd') * (request('amount_insured_tolerance') / 100)
            )
        ) * 
        request('usd_to_bdt_rate');

        $input = request()->except('_token');
        $risks = $this->coverNote->getRisksFromInput($input);
        $transits = $this->coverNote->getTransitsFromInput($input);
        $tariff = $this->coverNote->calculateTariff($risks);

        $vat_amount_bdt = $amount_insured_bdt * (request('vat_rate_bdt') / 100);

        $net_premium_bdt = $amount_insured_bdt * ($tariff / 100);
        $total_premium_bdt = $net_premium_bdt + $vat_amount_bdt;

        $coverNote = $this->coverNote->create([
            'id' => Str::uuid(),
            'issuing_office_id' => request('issuing_office_id'),
            'insured_bank_address' => request('insured_bank_address'),
            'insured_bank_account_name' => request('insured_bank_account_name'),
            'insured_address' => request('insured_address'),
            'interest_covered' => request('interest_covered'),
            'voyage_from' => request('voyage_from'),
            'voyage_to' => request('voyage_to'),
            'voyage_via' => request('voyage_via'),
            'carriage_id' => request('carriage_id'),
            'amount_insured_usd' => request('amount_insured_usd'),
            'amount_insured_tolerance' => request('amount_insured_tolerance'),
            'usd_to_bdt_rate' => request('usd_to_bdt_rate'),
            'amount_insured_bdt' => $amount_insured_bdt,
            'tk_in_word' => request('tk_in_word'),
            'period_starts' => request('period_starts'),
            'period_ends' => request('period_ends'),
            'mr_no' => request('mr_no'),
            'tariff' => $tariff,
            'net_premium_bdt' => $net_premium_bdt,
            'vat_rate' => request('vat_rate'),
            'vat_amount_bdt' => $vat_amount_bdt,
            'stamp_duty_bdt' => request('stamp_duty_bdt'),
            'total_premium_bdt' => $total_premium_bdt,
            'issued_by' => auth()->user()->id
        ]);

        $coverNote->risks()->attach($risks);
        $coverNote->transits()->attach($transits);

        return Redirect::route('cover-notes.show', $coverNote->id)->with('status', 'Cover Note created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return \Illuminate\Http\Response
     */
    public function show(CoverNote $coverNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return \Illuminate\Http\Response
     */
    public function edit(CoverNote $coverNote)
    {
        return View::make('cover-notes.edit', compact('coverNote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CoverNoteRequest  $request
     * @param  \App\Models\CoverNote  $coverNote
     * @return \Illuminate\Http\Response
     */
    public function update(CoverNoteRequest $request, CoverNote $coverNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoverNote $coverNote)
    {
        //
    }
}

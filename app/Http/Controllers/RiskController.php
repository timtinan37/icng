<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Http\Requests\RiskRequest;
use Illuminate\Support\Facades\{
    View,
    Redirect
};

class RiskController extends Controller
{
    private $risk;

    function __construct(Risk $risk)
    {
        $this->risk = $risk;

        $this->authorizeResource(Risk::class, 'risk');
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
        return View::make('risks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RiskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RiskRequest $request)
    {
        $risk = $this->risk->create([
            'name' => request('name'),
            'tariff' => request('tariff')
        ]);

        return Redirect::route('risks.show', $risk->id)->with('status', 'Risk created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function show(Risk $risk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function edit(Risk $risk)
    {
        return View::make('risks.edit', compact('risk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RiskRequest  $request
     * @param  \App\Models\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function update(RiskRequest $request, Risk $risk)
    {
        $risk->update([
            'name' => request('name'),
            'tariff' => request('tariff'),
        ]);

        return Redirect::route('risks.show', $risk->id)->with('status', 'Risk updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Risk $risk)
    {
        //
    }
}

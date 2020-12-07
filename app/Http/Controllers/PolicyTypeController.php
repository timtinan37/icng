<?php

namespace App\Http\Controllers;

use App\Models\PolicyType;
use App\Http\Requests\PolicyTypeRequest;
use Illuminate\Support\Facades\{
    View,
    Redirect,
};

class PolicyTypeController extends Controller
{
    private $policyType;

    function __construct(PolicyType $policyType)
    {
        $this->policyType = $policyType;

        $this->authorizeResource(PolicyType::class, 'policyType');
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
        return View::make('policy-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PolicyTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PolicyTypeRequest $request)
    {
        $policyType = $this->policyType->create([
            'name' => request('name'),
            'unique_code' => request('unique_code')
        ]);

        return Redirect::route('policy-types.show', $policyType->id)->with('status', 'Policy Type created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicyType  $policyType
     * @return \Illuminate\Http\Response
     */
    public function show(PolicyType $policyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyType  $policyType
     * @return \Illuminate\Http\Response
     */
    public function edit(PolicyType $policyType)
    {
        return View::make('policy-types.edit', compact('policyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PolicyTypeRequest  $request
     * @param  \App\Models\PolicyType  $policyType
     * @return \Illuminate\Http\Response
     */
    public function update(PolicyTypeRequest $request, PolicyType $policyType)
    {
        $policyType->update([
            'name' => request('name'),
            'unique_code' => request('unique_code')
        ]);

        return Redirect::route('policy-types.show', $policyType->id)->with('status', 'Policy Type updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicyType  $policyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolicyType $policyType)
    {
        //
    }
}

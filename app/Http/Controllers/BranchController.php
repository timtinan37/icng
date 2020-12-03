<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\BranchRequest;
use Illuminate\Support\Facades\{
    View,
    Redirect,
};

class BranchController extends Controller
{
    private $branch;

    function __construct(Branch $branch)
    {
        $this->branch = $branch;
    
        $this->authorizeResource(Branch::class, 'branch');
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
        return View::make('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        $branch = $this->branch->create([
            'name' => request('name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'fax_number' => request('fax_number'),
            'address' => request('address')
        ]);

        return Redirect::route('branches.show', $branch->id)->with('status', 'Branch created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        dd($branch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return View::make('branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BranchRequest  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        $branch->fill([
            'name' => request('name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'fax_number' => request('fax_number'),
            'address' => request('address')
        ]);
        $branch->save();

        return Redirect::route('branches.show', $branch->id)->with('status', 'Branch updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}

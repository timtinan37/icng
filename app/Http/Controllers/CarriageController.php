<?php

namespace App\Http\Controllers;

use App\Models\Carriage;
use App\Http\Requests\CarriageRequest;
use Illuminate\Support\Facades\{
    View,
    Redirect
};

class CarriageController extends Controller
{
    private $carriage;

    function __construct(Carriage $carriage)
    {
        $this->carriage = $carriage;

        $this->authorizeResource(Carriage::class, 'carriage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carriages = $this->carriage->paginate(10);

        return View::make('carriages.index', compact('carriages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('carriages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CarriageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarriageRequest $request)
    {
        $carriage = $this->carriage->create([
            'name' => request('name')
        ]);

        return Redirect::route('carriages.show', $carriage->id)->with('status', 'Carriage created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carriage  $carriage
     * @return \Illuminate\Http\Response
     */
    public function show(Carriage $carriage)
    {
        return View::make('carriages.show', compact('carriage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carriage  $carriage
     * @return \Illuminate\Http\Response
     */
    public function edit(Carriage $carriage)
    {
        return View::make('carriages.edit', compact('carriage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CarriageRequest  $request
     * @param  \App\Models\Carriage  $carriage
     * @return \Illuminate\Http\Response
     */
    public function update(CarriageRequest $request, Carriage $carriage)
    {
        $carriage->update([
            'name' => request('name')
        ]);

        return Redirect::route('carriages.show', $carriage->id)->with('status', 'Carriage updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carriage  $carriage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carriage $carriage)
    {
        $carriage->delete();

        return Redirect::route('carriages.index')->with('status', 'Carriage deleted.');
    }
}

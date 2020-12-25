<?php

namespace App\Http\Controllers;

use App\Models\Transit;
use App\Http\Requests\TransitRequest;
use Illuminate\Support\Facades\{
    View,
    Redirect
};

class TransitController extends Controller
{
    private $transit;

    function __construct(Transit $transit)
    {
        $this->transit = $transit;

        $this->authorizeResource(Transit::class, 'transit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transits = $this->transit->paginate(10);

        return View::make('transits.index', compact('transits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('transits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TransitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransitRequest $request)
    {
        $transit = $this->transit->create([
            'name' => request('name')
        ]);

        return Redirect::route('transits.show', $transit->id)->with('status', 'Transit created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transit  $transit
     * @return \Illuminate\Http\Response
     */
    public function show(Transit $transit)
    {
        if (request('ajax') == '1')
        {
            return $transit;
        }
        
        return View::make('transits.show', compact('transit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transit  $transit
     * @return \Illuminate\Http\Response
     */
    public function edit(Transit $transit)
    {
        return View::make('transits.edit', compact('transit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TransitRequest  $request
     * @param  \App\Models\Transit  $transit
     * @return \Illuminate\Http\Response
     */
    public function update(TransitRequest $request, Transit $transit)
    {
        $transit->update([
            'name' => request('name')
        ]);

        return Redirect::route('transits.show', $transit->id)->with('status', 'Transit updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transit  $transit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transit $transit)
    {
        $transit->delete();

        return Redirect::route('transits.index')->with('status', 'Transit deleted.');
    }
}

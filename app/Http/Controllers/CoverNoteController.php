<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoverNoteRequest;
use App\Models\Branch;
use App\Models\CoverNote;
use App\Models\Risk;
use App\Models\Transit;
use App\Services\CoverNoteGeneratorService;
use Illuminate\Support\Facades\{
    View,
    Redirect
};

class CoverNoteController extends Controller
{
    private $branch;
    private $coverNote;
    private $risk;
    private $transit;
    private $coverNoteGeneratorService;

    function __construct(CoverNote $coverNote, Branch $branch, Risk $risk, Transit $transit, CoverNoteGeneratorService $coverNoteGeneratorService)
    {
        $this->branch = $branch;
        $this->coverNote = $coverNote;
        $this->risk = $risk;
        $this->transit = $transit;
        $this->coverNoteGeneratorService = $coverNoteGeneratorService;

        $this->authorizeResource(CoverNote::class, 'coverNote');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverNotes = $this->coverNote->paginate(10);

        return View::make('cover-notes.index', compact('coverNotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = $this->branch->all();
        $risks = $this->risk->all();
        $transits = $this->transit->all();

        return View::make('cover-notes.create', compact('branches', 'risks', 'transits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CoverNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoverNoteRequest $request)
    {
        $preparedDataArray = $this->coverNote->prepareDataForInsertion($request);
        $coverNote = $this->coverNote->create($preparedDataArray['dataToInsert']);
        $coverNote->risks()->attach($preparedDataArray['risks']);
        $coverNote->transits()->attach($preparedDataArray['transits']);

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
        return View::make('cover-notes.show', compact('coverNote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return \Illuminate\Http\Response
     */
    public function edit(CoverNote $coverNote)
    {
        $branches = $this->branch->all();
        $risks = $this->risk->all();
        $transits = $this->transit->all();

        return View::make('cover-notes.edit', compact('coverNote', 'branches', 'risks', 'transits'));
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
        $preparedDataArray = $this->coverNote->prepareDataForInsertion($request);
        $coverNote->update($preparedDataArray['dataToInsert']);
        $coverNote->risks()->sync($preparedDataArray['risks']);
        $coverNote->transits()->sync($preparedDataArray['transits']);

        return Redirect::route('cover-notes.show', $coverNote->id)->with('status', 'Cover Note upated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoverNote $coverNote)
    {
        $coverNote->transits()->detach();
        $coverNote->risks()->detach();
        $coverNote->delete();

        return Redirect::route('cover-notes.index')->with('status', 'Cover Note Deleted!');
    }

    public function download(CoverNote $coverNote)
    {
        $fileType = request('fileType');
        
        $this->coverNoteGeneratorService->generate($coverNote, $fileType);
    }
}

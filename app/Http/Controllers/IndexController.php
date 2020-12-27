<?php

namespace App\Http\Controllers;

use App\Models\{
    CoverNote,
    Branch,
    Risk,
    User,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    function __construct(CoverNote $coverNote, Branch $branch, Risk $risk, User $user)
    {
        $this->coverNote = $coverNote;
        $this->branch = $branch;
        $this->risk = $risk;
        $this->user = $user;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $coverNotes = $this->coverNote->all()->count();
        $branches = $this->branch->all()->count();
        $risks = $this->risk->all()->count();
        $users = $this->user->all()->count();

        return View::make('index', compact('coverNotes', 'users', 'branches', 'risks'));
    }
}

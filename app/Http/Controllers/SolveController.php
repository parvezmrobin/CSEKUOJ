<?php

namespace App\Http\Controllers;

use Auth;
use App\Solve;
use Illuminate\Http\Request;

class SolveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('solve/index')->withSolves(Solve::where('user_id', Auth::user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Solve::class);

        $solve = new Solve();
        $solve->question_id = $request->input('ques');
        $solve->user_id = Auth::user()->id;
        $solve->status = 'ACC';
        $solve->time = .03;
        $solve->lang = 'PHP';
        $solve->save();

        // TODO: Check Solve

        $request->file('solve')->storeAs('slv/' . Auth::user()->id . '/' . $solve->id, 'solve.txt');

        return $this->index();
    }
}

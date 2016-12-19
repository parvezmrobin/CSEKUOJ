<?php

namespace App\Http\Controllers;

use Auth;
use App\Solve;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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

        //Check Solve
        //return $request->file('solve')->extension();
        $request->file('solve')->storeAs('', 'solve.cpp' );

        chdir("..\\storage\\app");
        exec('gcc solve.cpp -o solve.exe');
        $filePath = 'ques/' . Question::find($solve->question_id)->user_id . '/' . $solve->question_id;

        $fileOutput = Storage::get($filePath . '/output.txt');
        $resArray = array();
        $codeOutput = '';
        $preTime = microtime(true);
        exec('solve <' . storage_path(). "/app/" . $filePath . "/input.txt", $resArray);
        $postTime = microtime(true);
        foreach ($resArray as $key => $value) {
            $codeOutput .= ($value . chr(13) . "\n");
        }

        $res = strcmp($codeOutput, $fileOutput) === 0;

        //Continue building Solve object
        $solve->status = $res ? 'ACC' : 'WA';
        $solve->time = ($postTime - $preTime)/1000000;
        $solve->lang = 'C';
        $solve->save();

        $request->file('solve')->storeAs('slv/' . Auth::user()->id . '/' . $solve->id, 'solve.cpp');

        return $this->index();
    }
}

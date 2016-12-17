<?php

namespace App\Http\Controllers;

use Auth;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        return view('question/index')
            ->withQuestions(Question::where('user_id', Auth::user()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Question::class);

        return view('question/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Question::class);

        $question = new Question();
        $question->title = $request->title;
        $question->body = $request->body;
        $question->authorId = Auth::user()->id;
        $question->save();

        $request->file('infile')->storeAs('ques/' . Auth::user()->id . '/' . $question->id, 'input.txt');
        $request->file('outfile')->storeAs('ques/' . Auth::user()->id . '/' . $question->id, 'output.txt');

        $question->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $this->authorize('view', $question);
        return view('question.show')->withQuestion($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $this->authorize('update', $question);

        return view('question.edit')->withQuestion($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $this->authorize('update', $question);

        $question->title = $request->title;
        $question->body = $request->body;

        if($request->hasFile('infile')){
            $request->file('infile')->storeAs('ques/' . Auth::user()->id . '/' . $question->id, 'input.txt');
        }

        if ($request->hasFile('outfile')) {
            $request->file('outfile')->storeAs('ques/' . Auth::user()->id . '/' . $question->id, 'output.txt');
        }

        $question->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);

        $question->delete();

        return $this->index();
    }
}

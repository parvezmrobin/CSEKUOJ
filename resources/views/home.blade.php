@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul class="list-group">
                @forelse(App\Question::all() as $question)
                <li class="list-group-item"><a href="{{url('question') . '/' . $question->id}}">{{$question->title}}</a></li>
                @empty
                <li class="alert alert-info">No Question Available</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection

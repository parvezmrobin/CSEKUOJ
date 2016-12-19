@extends('layouts.app')

@section('content')
<div class="row">
    <div class="well col-md-8 col-md-offset-2">

        <h2>Your Questions</h2>
        <ul class="list-group">
            @forelse($questions as $question)
            <a href="{{url('question' . '/' . $question->id)}}">
                <li class="list-group-item">
                    {{$question->title}}<span class="badge">{{$question->lang}}</span>
                </li>
            </a>
            @empty
            <li class="alert alert-danger">No Question avilable</li>
            @endforelse
        </ul>


    </div>
</div>
@endsection

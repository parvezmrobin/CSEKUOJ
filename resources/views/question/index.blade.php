@extends('layouts.app')

@section('content')
<div class="row">
    <div class="well">

        @if($questions->count() === 0)
        <h3 class="alert alert-success">No Question avilable</h3>
        @endif

        @foreach($questions as $question)
        <a href="{{url('question' . '/' . $question->id)}}">
            <div class="panel panel-primary">
                <h2 class="panel-heading text-center">{{$question->title}}</h2>
                <div class="panel-body">
                    {{$question->body}}
                </div>
            </div>
        </a>
        @endforeach

    </div>
</div>
@endsection

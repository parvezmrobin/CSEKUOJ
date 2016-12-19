@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul class="list-group">
                @forelse($questions as $question)
                <li class="list-group-item"><a href="{{url('question') . '/' . $question->id}}">{{$question->title}}</a></li>
                @empty
                <h3 class="alert alert-info">No Question Available</h3>
                @endforelse
            </ul>
            {{$questions->links()}}
        </div>
    </div>
</div>
@endsection

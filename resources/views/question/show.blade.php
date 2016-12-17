@extends('layouts.app')

@section('title')
 - {{$question->title}}
@endsection

@section('content')
<div class="row">
    <div class="panel panel-primary">
        <h2 class="panel-heading text-center">{{$question->title}}</h2>
        <div class="panel-body">
            {{$question->body}}
        </div>
    </div>
    <div class="">
        <div class="col-md-6">
            <a href="{{url('question') . '/' . $question->id . '/edit'}}" class="btn btn-primary btn-lg">Edit</a>
        </div>
        <div class="col-md-6">
            <form  action="{{url('question') . '/' . $question->id}}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" name="" value="Delete" class="btn btn-danger btn-lg" style="float:right">
            </form>
        </div>
    </div>
</div>
@endsection

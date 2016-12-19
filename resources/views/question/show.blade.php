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
    @if($question->authorId === Auth::user()->id)
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
    @endif

    @if(Auth::user()->isInRole('student'))
    <form class="form-horizontal" enctype="multipart/form-data" action="{{url('solve')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="file" class="control-label col-md-2">Upload Solve</label>
            <div class="col-md-10">
                <input id="file" type="file" accept=".txt, .c, .cpp, .h, .php, .py" name="solve" class="form-control"  required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
                <input type="submit" name="" value="Upload" class="btn btn-success">
            </div>
        </div>

        <input type="hidden" name="ques" value="{{$question->id}}">
    </form>
    @endif
</div>
@endsection

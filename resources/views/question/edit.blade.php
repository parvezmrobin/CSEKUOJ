@extends('layouts.app')

@section('title')
 - Edit Question
@endsection

@section('content')
<div class="row">
    <div class="panel panel-primary">
        <h2 class="panel-heading text-center">Edit Question</h2>
        <form class="panel-body form-horizontal" method="POST" action="{{url('question') . '/' . $question->id }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="title" class="control-label col-md-2">Title</label>
                <div class="col-md-10">
                    <input id="title" type="text" name="title" value="{{ $question->title }}" class="form-control" placeholder="Title of the question" required>
                </div>
            </div>

            <div class="form-group">
                <label for="body" class="control-label col-md-2">Description</label>
                <div class="col-md-10">
                    <textarea name="body" rows="8" id="body" class="form-control" required>{{$question->body}}</textarea>
                </div>
            </div>
            <h4 class="alert alert-danger col-md-offset-2">Upload new file to replace old I/O files</h4>
            <div class="form-group">
                <label for="infile" class="control-label col-md-2">New Input File</label>
                <div class="col-md-10">
                    <input id="infile" type="file" name="infile" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="outfile" class="control-label col-md-2">New Output File</label>
                <div class="col-md-10">
                    <input id="outfile" type="file" name="outfile" class="form-control"  >
                </div>
            </div>

            <div class="form-group">
                <div class=" col-md-10 col-md-offset-2">
                    <input type="submit" name="" value="Submit" class="btn btn-primary">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

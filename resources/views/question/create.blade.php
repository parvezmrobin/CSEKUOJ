@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel panel-success">
        <h2 class="panel-heading text-center">Create Qestion</h2>
        <form class="panel-body form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('question') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title" class="control-label col-md-2">Title</label>
                <div class="col-md-10">
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Title" class="form-control" required>
                </div>
            </div>

            <br/>
            <div class="form-group">
                <label for="body" class="control-label col-md-2">Question Desciption</label>
                <div class="col-md-10">
                    <textarea name="body" rows="8" class="form-control" required>{{ old('body') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="infile" class="control-label col-md-2">Input FIle</label>
                <div class="col-md-10">
                    <input id="infile" type="file" name="infile" class="form-control" accept=".txt" required>
                </div>
            </div>
            <div class="form-group">
                <label for="outfile" class="control-label col-md-2">Output File</label>
                <div class="col-md-10">
                    <input id="outfile" type="file" name="outfile" class="form-control" accept=".txt" required>
                </div>
            </div>

            <div class="form-group">
                <div class=" col-md-10 col-md-offset-2">
                    <input type="submit" name="submit" value="Create" class="btn btn-success" required>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

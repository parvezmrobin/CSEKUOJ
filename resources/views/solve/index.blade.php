@extends('layouts.app')

@section('content')
<table class="table">
    <thead class="text-info">
        <th>Question</th>
        <th>Status</th>
        <th>Time</th>
        <th>Language</th>
    </thead>
    @foreach($solves as $solve)
    <tr>

        <td><a href="{{url('question') . '/' . $solve->question_id}}">
            {{App\Question::find($solve->question_id)->title}}
        </a></td>

        <td>{{$solve->status}}</td>
        <td>{{$solve->time}}</td>
        <td>{{$solve->lang}}</td>
    </tr>
    @endforeach
</table>
@endsection

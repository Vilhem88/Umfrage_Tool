@extends('master')

@section('content')
    <div class="text-center">
        <a href="{{ route('home.index') }}">back</a>
        <h2>Title: {{ $question->title}}</h2>
        <h4>Question: {{ $question->question}}</h4>
        <form action="{{ route('users.store')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
            <input type="hidden" name="question_id" value="{{ $question->id}}">
            @foreach ($answers as $answer)
            <div class="btn-group d-block" role="group" aria-label="Basic checkbox toggle button group">
                <label><input type="checkbox" name="answer_id[]" value="{{ $answer['id'] }}">&nbsp;{{ $answer['answer'] }}</label>
            </div>
            @endforeach
            <div>
                <button class="btn btn-primary">submit</button>
            </div>
        </form>
    </div>
@endsection
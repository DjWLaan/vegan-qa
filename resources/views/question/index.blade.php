@extends('layout.master')

@section('content')
    <span class="float-right">
        {{ link_to_route('question.create', 'Ask question', [], ['class' => 'btn btn-primary']) }}
    </span>
    <h1 class="card-title">
        Questions
    </h1>
    <div class="card-text">
        @forelse($questions as $question)
            <div class="border-light border-top pt-2 pb-2">
                {{ link_to_route('question.show', substr($question->content, 0, 30).(strlen($question->content) > 30 ? '...' : ''), $question->id) }}
            </div>
        @empty
            No questions were found... {{ link_to_route('question.create', 'Ask as new one!') }}
        @endforelse
    </div>
@endsection

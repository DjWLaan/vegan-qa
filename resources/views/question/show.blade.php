@extends('layout.master')

@section('content')
    <span class="float-right">
        {{ link_to_route('question.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
    </span>
    <h1 class="card-title">
        {{ $question->content }}
    </h1>
    <div class="card-text">
        @forelse($question->answers()->orderBy('created_at')->get() as $answer)
            <div class="m-2 p-2 border-top">
                <span class="badge badge-info float-right">{{ $answer->created_at }}</span>
                <br>
                {{ $answer->content }}
            </div>
        @empty
            No answers were given yet...
        @endforelse
        @include('layout.errors')
        {{ Form::open(['route' => ['answer.store', $question->id], 'method' => 'POST', 'class' => 'mt-3 pt-3 border-top']) }}
            <div class="form-group">
            {{ Form::textarea('content', old('content'),
                ['placeholder' => 'Type your answer',
                'class' => 'p-2 form-control', 'rows' => 3]) }}
            </div>
            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>
@endsection

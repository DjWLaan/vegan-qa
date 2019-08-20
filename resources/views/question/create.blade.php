@extends('layout.master')

@section('content')
    <span class="float-right">
        {{ link_to_route('question.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
    </span>
    <h1 class="card-title">
        Ask a question
    </h1>
    <div class="card-text">
        @include('layout.errors')
        {{ Form::open(['route' => ['question.store'], 'method' => 'POST']) }}
            <div class="form-group">
            {{ Form::textarea('content', old('content'),
                ['placeholder' => \Arr::random(['What is meat?', 'How are plants eaten?', 'Why are vegans often human?']),
                'class' => 'p-2 form-control', 'rows' => 3]) }}
            </div>
            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>
@endsection

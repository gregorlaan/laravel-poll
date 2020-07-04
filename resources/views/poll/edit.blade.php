 
@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Poll</h1>

    <form action="/poll/{{$poll->uuid}}" enctype="multipart/form-data" method="post" autocomplete="false">
        @method('PATCH')
        @csrf

        @error('choices')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <label for="poll-name">
                <small class="form-text text-muted">Title</small>
            </label>

            <input type="text" 
                class="form-control form-control-lg focus-light-blue bg-light-gray light-shadow @error('poll-name') is-invalid @enderror" 
                name="poll-name"
                id="poll-name"
                placeholder="Here you can give your poll a name"
                value="{{ old('poll-name') ?? $poll->name }}"
            >
        
            @error('poll-name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="question-name">
                <small class="form-text text-muted">Question</small>
            </label>

            <input 
                type="text" 
                class="form-control form-control-lg focus-light-blue bg-light-gray light-shadow @error('question-name') is-invalid @enderror" 
                name="question-name" 
                id="question-name" 
                placeholder="Here goes the question"
                value="{{ old('question-name') ?? $poll->question->name }}"
            >
        
            @error('question-name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        @foreach ($poll->question->choices as $choice)
            <div class="form-group">
                <label for="choice-{{ $loop->index + 1 }}">
                    <small class="form-text text-muted">Option {{ $loop->index + 1 }}</small>
                </label>

                <input type="text"
                    class="form-control form-control-lg focus-light-blue bg-light-gray light-shadow"
                    name="choices[{{ $choice->uuid }}]"
                    id="choice-{{ $loop->index + 1 }}"
                    placeholder="Option {{ $loop->index + 1 }}"
                    value="{{ old('choices.' . $choice->uuid) ?? $choice->name }}"
                >
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary btn-lg px-4 bg-light-blue">Publish</button>

    </form>

</div>
@endsection
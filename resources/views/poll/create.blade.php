 
@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add a New Poll</h1>

    <form action="/poll" enctype="multipart/form-data" method="post" autocomplete="false">
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
                name="poll-name" id="poll-name" placeholder="Here you can give your poll a name">
        
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

            <input type="text" 
                class="form-control form-control-lg focus-light-blue bg-light-gray light-shadow @error('question-name') is-invalid @enderror" 
                name="question-name" id="question-name" placeholder="Here goes the question">
        
            @error('question-name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="choice-1">
                <small class="form-text text-muted">Option 1</small>
            </label>
            
            <input type="text"
                class="form-control form-control-lg focus-light-blue bg-light-gray light-shadow" 
                name="choices[]" 
                id="choice-1" 
                placeholder="Option 1"
            >
        </div>

        <div class="form-group">
            <label for="choice-2">
                <small class="form-text text-muted">Option 2</small>
            </label>
            
            <input type="text"
                class="form-control form-control-lg focus-light-blue bg-light-gray light-shadow" name="choices[]" id="choice-2" placeholder="Option 2">
        </div>

        <div class="form-group">
            <label for="choice-3">
                <small class="form-text text-muted">Option 3</small>
            </label>
            
            <input type="text"
                class="form-control form-control-lg focus-light-blue bg-light-gray light-shadow" name="choices[]" id="choice-3" placeholder="Option 3">
        </div>

        <button type="submit" class="btn btn-primary btn-lg px-4 bg-light-blue">Publish</button>

    </form>

</div>
@endsection
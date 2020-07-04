 
@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center mt-4 mb-5">
        <h1>{{ $poll->name }}</h1>
        <h2 class="display-4">{{ $poll->question->name }}</h1>
    </div>
        
    @foreach ($poll->question->choices as $choice)
        <div>
            <input type="checkbox" hidden class="form-check-input choice-selection" name="choices[]" id="choice-{{ $loop->index }}" value="{{ $choice->uuid }}">
            <label class="form-check-label bg-light-gray p-3 mb-4 rounded d-block choice-label" for="choice-{{ $loop->index }}">
                <span class="h3 pl-3">{{ $choice->name }}</span>
            </label>
        </div>
    @endforeach

</div>
@endsection
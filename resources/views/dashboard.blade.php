@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4 section-title">
        <span>My Polls</span>
    </h2>

    @foreach($polls as $poll)

        <div class="p-5 mb-4 rounded bg-light-gray d-block">
            <a href="/poll/{{ $poll->uuid }}" class="text-decoration-none">
                <h1>{{ $poll->question->name }}</h1>
            </a>

            <h3>{{ $poll->name }}</h3>

            @can('update', $poll)
                <a href="/poll/{{ $poll->uuid }}/edit" id="edit-poll" class="btn btn-outline-primary font-weight-bold px-4 mt-2">Edit Poll</a>
            @endcan
        </div>

    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $polls->links('pagination::polls') }}
        </div>    
    </div>

</div>
@endsection
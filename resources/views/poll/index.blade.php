@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($polls as $poll)

        <div class="p-5 mb-4 rounded bg-light-gray d-block">
            <a href="/poll/{{$poll->uuid}}" class="text-decoration-none">
                <h1>{{ $poll->question->name }}</h1>
            </a>
            <h3>{{ $poll->name }}</h3>
        </div>

    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $polls->links('pagination::polls') }}
        </div>    
    </div>

</div>
@endsection
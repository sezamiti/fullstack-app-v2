@extends('layouts.app')
@section('content')
    <div id="app">
        <article-component></article-component>
    </div>

    <hr>

    @foreach ($article->comments as $comment)
        <div class="ss" style="width: 100%;">
            <img src="https://via.placeholder.com/64" class="rounded me-2" alt="...">
            <strong class="me-auto">{{$comment->subject}}</strong>
            <small class="text-muted">{{$comment->createdAtForHumans()}}</small>
            <div class="sss">{{$comment->body}}</div>
        </div>
    @endforeach

    <script src="{{ mix('js/app.js') }}"></script>
@endsection

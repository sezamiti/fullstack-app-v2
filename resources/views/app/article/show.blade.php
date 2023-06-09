@extends('layouts.app')
@section('content')
    <div id="app">
        <div class="row mt-5">
            <div class="col-12 p-3">
                <article-component></article-component>
                <img src="{{$article->img}}" class="border rounded mx-auto d-block" alt="">
                <h5 class="mt-5">{{$article->tile}}</h5>
                <p>
                    @foreach($article->tags as $tag)
                        @if($loop->last)
                            <span class="tag">{{$tag->label}}</span>
                        @else
                            <span class="tag">{{$tag->label}}</span>
                        @endif
                    @endforeach
                </p>

                <p class="card-text">{{$article->body}}</p>
                <p>Опубликовано: <i>{{ $article->createdAtForHumans()}}</i></p>
                    <span class="badge bg-primary">{{$article->state->likes}} <i class="far fa-thumbs-up"></i></span>
                    <span class="badge bg-danger">{{$article->state->views}} <i class="far fa-eye"></i></span>

            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <form action="">
           <div class="mb-3">
               <label for="commentSubject" class="form-label">Тема комментария</label>
               <input type="text" class="form-control" id="commentSubject">
           </div>
            <div class="mb-3">
                <label for="commentBody" class="form-label">Комментарий</label>
                <textarea type="text" class="form-control" id="commentBody" rows="3"></textarea>
            </div>
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>
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
@section('vue')
    <script src="{{mix('js/app.js')}}"></script>
@endsection

@endsection






@extends('layouts.app')

@section('hero')
    @include('app.partials.hero')
@endsection

@section('content')
    <h1 class="d-flex justify-content-around mt-5">
        Новости
    </h1>
    <div class="row mt-2">
        @foreach($articles as $article)
            <div class="col-4 pb-3">
                <div class="card">
                    <img src="{{$article->img}}" class="card-img-top" alt="...">
                    <p class="position-absolute top-0 end-0">{{$article->published_at}}</p>
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->getBodyPreview()}}</p>
                        <p>{{$article->createdAtForHumans()}}</p>
                        <a href="{{route('article.show', $article->slug)}}" class="btn btn-primary">Подробнее</a>
                        <div class="mt-3">
                            @if ($article->state)
                                <span class="badge bg-primary">{{$article->state->likes}} <i class="far fa-thumbs-up"></i></span>
                                <span class="badge bg-danger">{{$article->state->views}} <i class="far fa-eye"></i></span>
                            @else
                                <span class="badge bg-primary">0 <i class="far fa-thumbs-up"></i></span>
                                <span class="badge bg-danger">0 <i class="far fa-eye"></i></span>
                            @endif
                        </div>
                        <div class="mt-4">
                            Теги:
                            @foreach ($article->tags as $tag)
                                <a href="{{route('article.tag', $tag->id)}}" class="badge bg-danger">{{$tag->label}}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mx-auto" style="width: max-content"> {{$articles->links()}} </div>
@endsection

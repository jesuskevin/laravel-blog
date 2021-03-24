@extends('layouts/layout')

@section('title', 'Post')

@section('content')
    <!-- Contenido -->
    <section class="container-fluid content py-5">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-12 col-md-7 text-center">
                <h1>{{$post->title}}</h1>
                <hr>
                <img src="{{asset($post->picture)}}" alt="Post Javascript" class="img-fluid">

                <p class="text-left mt-3 post-txt">
                    <span>Autor: {{$post->author}}</span>
                    <span class="float-right">Publicado: {{$post->created_at->diffForHumans()}}</span>
                </p>
                <p class="text-left">
                    {{$post->content}}
                </p>
                <p class="text-left post-txt"><i>Categoría: {{$post->category->name}}</i></p>
            </div>

            <!-- Entradas recientes -->
            <div class="col-md-3 offset-md-1">
                <p>Últimas entradas</p>
                @foreach ($lastPost as $last)
                
                <div class="row mb-4">
                    <div class="col-4 p-0">
                        <a href="/post/{{$last->id}}">
                            <img src="{{asset($last->picture)}}" class="img-fluid rounded" width="100" alt="{{$last->title}}">
                        </a>
                    </div>
                    <div class="col-7 pl-0">
                        <a href="/post/{{$last->id}}" class="link-post">{{$last->title}}</a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Posts relacionados -->
    <section class="container-fluid content py-5">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-12 text-center">
                <h2>Entradas relacionadas</h2>
                <hr class="post-hr">
            </div>
            <!-- Post 1 -->
            @foreach ($entradasRelacionadas as $entrada)
                
            <div class="col-md-4 col-12 justify-content-center mb-5">
                <div class="card m-auto" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset($entrada->picture)}}" alt="Post Python">
                    <div class="card-body">
                        <small class="card-txt-category">Categoría: {{$entrada->category->name}}</small>
                        <h5 class="card-title my-2">{{$entrada->title}}</h5>
                        <div class="d-card-text">
                            {{Str::limit($entrada->content)}}
                        </div>
                        <a href="/post/{{$entrada->id}}" class="post-link"><b>Leer más</b></a>
                        <hr>
                        <div class="row">
                            <div class="col-6 text-left">
                                <span class="card-txt-author">{{$entrada->author}}</span>
                            </div>
                            <div class="col-6 text-right">
                                <span class="card-txt-date">{{$entrada->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
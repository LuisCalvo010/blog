@extends('layouts.master')

@section('content')
<h1 class="center-align">Últimas Publicaciones</h1>
<hr>
<div class="row">
    <div id="publicaciones" class="col m12">
        @foreach($posts as $post)
        <div class="col s12 m6">
            <div class="card grey lighten-5">
                <div class="card-content white-text">
                    <span class="card-title grey-text text-darken-3">{{$post->title}}</span>
                    <p class="red-text text-lighten-2">{{ str_limit($post->body, 50)}}</p>
                    <br>
                    <p class="red-text text-lighten-2">Publicado por: {{$post->user->name}}</p>
                </div>
                <div class="card-action">
                    <a href="/posts/{{$post->id}}">Leer más>></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
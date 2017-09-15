@extends ('layouts.master')
@section('content')
<div class="row">
    <div class="col m12">
        <h1 class="center-align">{{$post->title}}</h1>
        <div class="center-align"><a href="/posts/{{$post->id}}.pdf" target="pdf" class="waves-effect waves-light btn"><i class="material-icons right">print</i>Imprimir</a></div>
  
        <p class="center-align">Publicado por: {{$post->user->name}}</p>
        <p class="center-align">{{ $post->created_at}}</p>
        <p class="center-align">{{ $post->body}}</p>
        <br>
        <h1 class="center-align">Comentarios</h1>
        <hr>
        
        <!--Formulario para comentarios-->
        
        <div class="col m10 offset-m1 center-align">
            <div class="row">
                @if(Auth::check())
                <form id="formComment" method="post" action="/post/{{$post->id}}/comments" class="col s12" >
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $post->id}}">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="body" class="materialize-textarea" name="body" required></textarea>
                            <label for="body">¿Deseas comentar algo?</label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Comentar</button>
                    </div>
                </form>
                @endif
                @if(!Auth::check())
                <h4>¿Quieres Agregar un Comentario?</h4>
                <a href="/login">
                    <h5 class="red-text text-lighten-2 center-align">Inicia Sesion</h5>
                </a>
                @endif
            </div>
        </div>
        
        @include('layouts.error')
        
        
        <div class="col m6 offset-m3 center-align">
            <ul class="collection" id="commentBox">
                @foreach($post->comments as $comment)
                    <li class="collection-item">
                        <p class="chip">
                            {{$comment->created_at->diffForHumans()}}
                        </p><br>
                        <p>Comentado por: {{$comment->user->name}}</p><br>
                        {{$comment->body}}<br>
                    </li>
                @endforeach
            </ul>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col m12 center-align">
        <a href="/">Regresar</a>
    </div>
</div>
    
@endsection

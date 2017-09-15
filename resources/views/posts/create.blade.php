 @extends('layouts.master')

@section('content')
<h1 class="center-align">Publicaciones</h1>
<hr>
<br>
<div class="row">
    <form class="col s12" action="/posts" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12"> 
                <label for="title">Título</label>
                <input name="title" placeholder="Ingresa Titulo" id="title" type="text" class="validate">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label for="body">Contenido</label>
                <textarea name="body" placeholder="Ingresa Contenido" id="body" class="materialize-textarea"></textarea>
            </div>
        </div>
        <div class="center-align">
            <button class="btn-large waves-effect waves-light" type="submit">Publicar</button>
        </div>
    </form>
    
</div>
@include('layouts.error')
        
@endsection
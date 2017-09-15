@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <h1>MI BLOG</h1>
        <img class="materialboxed" width="250" src="img/users/{{auth()->user()->image}}">
        <p>Nombre: {{Auth::user()->name}}</p>
        <p>Correo: {{Auth::user()->email}}</p>
        <h2>MIS PUBLICACIONES</h2>
        <hr>
        <table>
            <thead>
              <tr>
                  <th>Titulo</th>
                  <th>Opciones</th>
              </tr>
            </thead>

            <tbody>
                @foreach(Auth::user()->posts as $post)
                <tr class="post-{{$post->id}}">
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="/posts/{{ $post->id }}">Ver </a>|
                        <a href="/posts/{{ $post->id }}/edit">Editar </a>|
                        <a href="" class="btnDelete" data-id="{{$post->id}}" data-token="{{csrf_token()}}"> Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/users/{{auth()->user()->id}}/edit" class="waves-effect waves-light btn "><i class="material-icons right">edit</i>Editar Perfil</a>
        
        <a href="/users/{{auth()->user()->id}}" class="waves-effect waves-light btn red darken-33"><i class="material-icons right">delete_forever</i>Eliminar Cuenta</a>
        
        <a href="/users/image" class="waves-effect waves-light btn blue accent-4"><i class="material-icons right">image</i>Subir Imagen</a>
        
        
    </div>
</div>
    
   
      
    
        
@endsection
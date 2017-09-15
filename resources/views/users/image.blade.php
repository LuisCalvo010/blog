@extends ('layouts.master')
@section('content')

<div class="row">
    <h1 class="center-align">Imagen de Perfil</h1>
    <form class="col s12" enctype="multipart/form-data" method="post" action="/users/{{auth()->user()->id}}/image">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Imagen</span>
                    <input type="file" name="image">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
                <button class="btn-large waves-effect waves-light" type="submit">Subir</button>
            </div>
        </div>
    </form>
    @include('layouts.error')
</div>
@endsection
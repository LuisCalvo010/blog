@extends ('layouts.master')
@section('content')

<div class="row">
    <h1 class="center-align">Editar Perfil</h1>
    <form class="col s12" method="post" action="/users/{{$user->id}}/update">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input placeholder="Nombre" id="name" type="text" class="validate" name="name" value="{{Auth::user()->name}}">
                <button class="btn-large waves-effect waves-light" type="submit">Guardar Datos</button>
            </div>
        </div>
    </form>
    @include('layouts.error')
</div>
@endsection
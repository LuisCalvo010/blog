@extends ('layouts.master')
@section('content')

<div class="row">
    <h1 class="center-align">Registro</h1>
    <form class="col s12" method="post" action="/users">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input placeholder="Nombre" id="name" type="text" class="validate" name="name">
                <label for="name">Nombre</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">Email</label>
            </div>
        </div> 
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input id="password_confirmation" type="password" class="validate" name="password_confirmation">
                <label for="password_confirmation">Confirmacion Password</label>
            </div>
        </div>
        <div class="row">
            <div class="col s6 offset-s3">
                <button class="btn waves-effect waves-light col s6 offset-s3" type="submit" name="action">Registrar</button>
            </div>
        </div>
    </form>
    @include('layouts.error')
</div>
@endsection
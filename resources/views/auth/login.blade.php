@extends('layouts.master')
@section('content')

<div class="row">
    <h1 class="center-align">Login</h1>
    <form method="post" action="/login">
        {{csrf_field()}}
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
            <div class="col s6 offset-s3">
                <button class="btn waves-effect waves-light col s6 offset-s3" type="submit" name="action">Login</button>
            </div>
        </div>
    </form>
    <a href="/register"><p class="center-align">¿Aún no tienes cuenta?<br>Regístrate Aquí</p></a>
    @include('layouts.error')
</div>
@endsection
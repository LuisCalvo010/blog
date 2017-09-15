<?php

use App\posts;

Route::get('/' , 'PostsController@index');
Route::get('/register','RegistrationController@create');
Route::get('/login', 'SessionsController@create');
Route::get('/pruebaAjax', 'AjaxController@prueba');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/perfil', 'UsersController@profile');
    Route::get('/posts/create' , 'PostsController@create');
    Route::get('/posts/{post}/edit', 'PostsController@edit');
    Route::get('/logout', 'SessionsController@logout');
    Route::get('/users/image', 'UsersController@imageEdit');
    Route::get('/users/{user}', 'UsersController@delete');
    Route::get('/users/{user}/edit', 'UsersController@edit');
    
    Route::post('/posts', 'PostsController@store');
    Route::post('/posts/{post}/update', 'PostsController@update');
    Route::post('/users/{user}/image', 'UsersController@imageUpdate');
    Route::post('/users/{user}/update', 'UsersController@update');
    
    Route::delete('/posts/{post}', 'PostsController@delete');

});

Route::get('/posts/{post}.pdf' , 'PostsController@pdf');
Route::get('/posts/{post}' , 'PostsController@show');


Route::post('/login', 'SessionsController@auth');
Route::post('/users', 'RegistrationController@store');
Route::post('/post/{post}/comments', 'CommentsController@store');

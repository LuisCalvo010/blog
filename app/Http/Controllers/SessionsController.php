<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;

class SessionsController extends Controller
{
    public function create()
    {
        return view ('auth.login');
    }
    
    public function auth()
    {
        $this->validate(request(),['password' =>'required', 'email'=>'required']);
        if(auth()->attempt(['email' => request('email'), 'password' => request('password')]))
        {
            //los datos correctos
            return redirect('/posts/create');
        }
        //Incorrectos
        return view('/login');
    }
    
    public function logout()
    {
        auth()->logout();
        return redirect ('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    
    public function imageEdit()
    {
        return view('users.image');
    }
    
   
    
    public function update(User $user)
    {
        $this->validate(request(),['name'=>'required']);
        $user->name = request('name');
        $user->save();
        
        return redirect('/perfil');
    }
     public function imageUpdate(User $user)
    {
        $this->validate(request(),['image'=>'required|image|mimes:jpeg,png,jpg']);
         
        $image = request()->file('image');
        $imageName= $image->getClientOriginalName();
        $imagePath = public_path(DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'users');
         
        //Server public/img/users
        $image->move($imagePath, time() . '-' . $imageName);
         
        //campo en DB
        $user->image=time() . '-' . $imageName;
        $user->save();
        
        return redirect('/perfil');
    }
    public function delete(User $user)
    {
        auth()->logout();
        User::destroy($user->id);
        return redirect ('/');
        //Borrar al usuario
        //Cerrar sesion 
        //Redireccionar login 
    }
}

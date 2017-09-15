<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        if (request('body')== ''){
            return array(
                'respuesta' => false,
                'mensaje'=>'Ingresa un Comentario'
            );
        }
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id= auth()->user()->id;
        $comment->body = request('body');
        $comment->save();
        
        
        return array(
            'respuesta' => true,
            'mensaje' => 'comentario agregado',
            'data' => array(
                'fecha' => $comment->created_at->diffForHumans(),
                'nombre' => $comment->user->name,
                'comentario' => $comment->body
            )        
        );
        
        /* Esto sirve para Formularios normales y no AJAX
        $this->validate(request(),['body' => 'required']);
        
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id= auth()->user()->id;
        $comment->body = request('body');
        $comment->save();
        
        return back();
        */
    }
}

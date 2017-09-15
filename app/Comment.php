<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*Esta funcion sirve para usar:
        $comments = Comment::all();
    
    */
    public function user ()
    {
        return $this->belongsTo('App\User');
    }
} 

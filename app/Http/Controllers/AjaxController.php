<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function prueba()
    {
        $tareas = array(
            'Tarea 1',
            'Tarea 2',
            'Tarea 3'
        
        );
        
        return $tareas;
        
    }
}

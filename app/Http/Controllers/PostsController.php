<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use FPDF;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
        
    }
    
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    
    public function create()
    {
        return view('posts.create');
        // Crear un nuevo post
        // Guardarlo en la base
        // Redireccionar al index
    }
    
    public function store()
    {
        
        /*
        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->save();*/
        
        $this->validate(request(),['title'=>'required', 'body' => 'required']);
        
        $arreglo=request(['title','body']);
        $arreglo['user_id']=auth()->user()->id;
        
        
        Post::create($arreglo); //Se necesitan poner en el modelo el fillable
        //Post::create(request()->all());/Se necesitan poner en el modelo el fillable
        
        return redirect('/');
        
        //dd(request()->all());//PRUEBAS para vertodo lo que trae esa variable post 
        
        
    }
    
    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }
    
    public function update(Post $post)
    {
        $this->validate(request(),['title'=>'required', 'body' => 'required']);
        
        $post->title = request('title');
        $post->body = request('body');
        $post->updated_at = date('Y-m-d H:i:s');
        $post->save();
        
        return redirect('/perfil');
        
    }
    
    public function delete(Post $post){
        $data= Post::destroy($post->id);
        
        if ($data == 1){
            return array(
                'mensaje' => 'Se elimino el Post',
                'respuesta' => true
            );
        }
        return array(
            'mensaje' => 'No se pudo eliminar',
            'respuesta' => false
        );
        
    }
    
    public function pdf(Post $post)
    {
        $pdf= new FPDF();
        $pdf->AddPage();
        
        
        /*Titulo*/
        $pdf->SetFont('Arial','B');
        $pdf->SetFontSize(20);
        $pdf->SetXY(30,20);
        $pdf->Write(0, $post->title);
        
        /*Autor*/
        $pdf->SetFont('Arial');
        $pdf->SetFontSize(14);
        $pdf->SetXY(30,30);
        $pdf->Write(0,"Escrito por: " . $post->user->name);
        
        /*Fecha*/
        $pdf->SetFont('Arial');
        $pdf->SetFontSize(14);
        $pdf->SetXY(30,40);
        $pdf->Write(0,$post->created_at);
        /*Contenido*/
        $pdf->SetFont('Arial');
        $pdf->SetFontSize(14);
        $pdf->SetXY(30,50);
        $pdf->MultiCell(150,7,$post->body);
        
        $pdf->Output();
        exit;
    }
    
} 




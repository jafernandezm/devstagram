<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    

    public function store(Request $request,User $user,Post $post){
        //validar
        $this->validate(request(),[
            'comentario' => 'required|max:255',
        ]);
        //Almacenar
        Comentario::create([
            'user_id' => auth()->user()->id, // id del usuario logueado
            'post_id' => $post->id,
            'comentario' => $request->comentario,
        ]);
        //redireccionar
        return back()->with('mensaje','Comentario Realizado Correctamente');



    }
}

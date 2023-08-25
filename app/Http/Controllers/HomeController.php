<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        // si no esta logueado no puede acceder a la pagina excepto a index y show
        $this->middleware('auth');
    }

    public function __invoke()
    {
        //dd('hola');
        //recuperamos los pos de las persona que seguimos 
        //dd(auth()->user()->followings->pluck('id')->toArray() );
       
        
        // Verifica si el usuario está autenticado
        if (auth()->check()) {
            // El usuario está autenticado, podemos acceder a sus propiedades
            $users = auth()->user()->followings->pluck('id')->toArray();
            $posts = Post::whereIn('user_id', $users)->latest()->paginate(20);
    
            return view('home', [
                'posts' => $posts
            ]);
        } else {
            // El usuario no está autenticado, puedes tomar medidas apropiadas
            // como redirigirlo a la página de inicio de sesión o mostrar un mensaje de error.
            return redirect('/login'); // Por ejemplo, redirige a la página de inicio de sesión.
        }
        
        
        
        
    }
    
        
    


}

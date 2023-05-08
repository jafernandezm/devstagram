<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Post;
class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {
        //dd($user->username);
        $posts= Post::where('user_id', $user->id)->paginate(10);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);

    }

    public function create()
    {
        

        return view('posts.create');
    }
    public function store(Request $request){
        $this->validate( $request,[
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);
        // una forma de crear un usuario
        /*Post::create([
            'user_id' => auth()->user()->id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
        ]);*/

        // otra forma de crear un usuario
        /*$post = new User();
        $post->user_id = auth()->user()->id;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->save();*/
        // otra forma de crear un usuario
        $request->user()->posts()->create([
            'user_id' => auth()->user()->id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
        ]);
        
        
        return redirect()->route('posts.index', auth()->user()->username);
    }
    public function show(Post $post){
        //dd($post);


        return view('posts.show',[
            'post' => $post
        ]);
    }
}

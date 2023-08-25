<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class PerfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
       return view('perfil.index');
    }

    public function store(Request $request){
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate(request(),[
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:25','not_in:login,register,logout,principal,editar-perfil,twitter'],
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . '.' . $imagen->extension();

            $imagenServidor =Image::make($imagen);
            $imagenServidor->fit(800,600);

            $imagenPath = public_path('perfiles' . '/'.$nombreImagen);
            
            $imagenServidor->save($imagenPath);

            
        }
        //buscamos el usuario por el id
        $usuario = User::find(auth()->user()->id);
        //actualizamos los datos
        $usuario->username = $request->username;
        //si hay imagen la guardamos
        $usuario->imagen=$nombreImagen ?? auth()->user()->imagen ?? '';
        $usuario->save();
        //redireccionamos a la vista de perfil
        return redirect()->route('posts.index', $usuario->username);
        
    }
}

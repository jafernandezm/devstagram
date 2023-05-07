<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {


        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => 'required|min:5',
            'username' => 'required|unique:users|min:3|max:25',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        //autenticar un usuario
        /*auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);*/
        //otra forma 
        //con el metodo only se puede especificar que campos se van a enviar
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index',[
            'user' => auth()->user()->username
        ]);

    }
   




}





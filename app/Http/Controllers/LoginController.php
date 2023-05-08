<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //\dd($request);
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        //auth()->attempt($request->only('username', 'password'));

        //dd($request->only('email', 'password'));
        if (!auth()->attempt($request->only('username', 'password'), $request->remember )) {
            return back()->with('mensaje', 'Credenciales Inconrrectas');
        }

    
        return redirect()->route('posts.index',[
            'user' => auth()->user()->username
        ]);

    }


}

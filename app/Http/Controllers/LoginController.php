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

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //dd($request->only('email', 'password'));
        if (!auth()->attempt($request->only('email', 'password'), $request->remember )) {
            return back()->with('mensaje', 'Credenciales Inconrrectas');
        }

        return redirect()->route('posts.index',[
            'user' => auth()->user()->username
        ]);

    }


}

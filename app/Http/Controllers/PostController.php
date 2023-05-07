<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function create()
    {
        

        return view('posts.create');
    }
}

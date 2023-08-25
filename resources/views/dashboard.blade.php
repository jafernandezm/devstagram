@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection
 
@section('contenido')
    <div class="flex justify-center">
        <div class="flex flex-col items-center w-full md:w-8/12 lg:w-6/12 md:flex-row">
            <div class="w-8/12 px-5 lg:w-6/12">
                <img src="{{
                    $user->imagen ? asset('perfiles') .'/'. $user->imagen 
                    : asset('img/usuario.svg') }}" 
                    alt="Imagen Usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-7 md:flex md:flex-col md:justify-center">
                <div class="flex items-center gap-4">
                    <p class="mb-3 text-3xl text-gray-700" >{{$user->username }}</p>
                    @auth
                        {{-- si el perfil es de la persona  --}}
                        @if (auth()->user()->id == $user->id)
                            <a href="{{route('perfil.index')}}" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                
                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $user->followers->count() }}
                   
                    <span class="font-normal">@choice('seguidor|seguidores',$user->followers->count()) </span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $user->followings->count() }}
                   
                    <span class="font-normal"> Siguiendo </span>
                </p>
                
                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $posts->count() }}
                    {{-- $user->post->count() --}}
                    <span class="font-normal"> Posts</span>
                </p> 
                @auth
                    @if($user->id !== auth()->user()->id )
                        @if(!$user->siguiendo(auth()->user() ))
                            <form action="{{ route('users.follow', $user)}}" method="POST">
                                @csrf
                                <input type="submit" 
                                class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer" value="Seguir">
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user)}}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" 
                                class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer" value="Dejar de Seuir">
                            </form>

                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>


    <section>
        <h2 class="my-10 text-4xl font-black text-center">Publicaciones</h2>
        <x-listar-post :posts="$posts"/>
    </section>
@endsection
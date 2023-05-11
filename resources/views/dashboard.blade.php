@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection
 
@section('contenido')
    <div class="flex justify-center">
        <div class="flex flex-col items-center w-full md:w-8/12 lg:w-6/12 md:flex-row">
            <div class="w-8/12 px-5 lg:w-6/12">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen Usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-7 md:flex md:flex-col md:justify-center">
                
                <p class="mb-3 text-3xl text-gray-700" >{{$user->username }}</p>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>
                
                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $posts->count() }}
                    <span class="font-normal">Posts</span>
                </p> 
            </div>
        </div>
    </div>


    <section>
        <h2 class="my-10 text-4xl font-black text-center">Publicaciones</h2>
        @if ($posts->isEmpty())
            <p class="text-center">No hay publicaciones</p>
        
        @else
            <div class="grid gap-6 md:grid-cols-2 lg:grid -cols-3 xl:grid-cols-4">
                @foreach ($posts as $post)
                    <div class="">
                        <a href="{{route('posts.show', ['post'=> $post, 'user' => $user ])}}">
                            <img src="{{ asset('uploads'). '/' .   $post->imagen}}" alt="Imagen Del post {{ $post->titulo}}">
                        </a>
                        
                    </div>
                @endforeach
            </div>
         @endif
         <div class="my-10">
            {{ $posts->links() }}
         </div>
    </section>
@endsection
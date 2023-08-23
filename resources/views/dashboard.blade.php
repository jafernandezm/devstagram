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
                <div class="flex items-center gap-4">
                    <p class="mb-3 text-3xl text-gray-700" >{{$user->username }}</p>
                    @auth
                        {{-- si el perfil es de la persona  --}}
                        @if (auth()->user()->id == $user->id)
                            <a href="" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                
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
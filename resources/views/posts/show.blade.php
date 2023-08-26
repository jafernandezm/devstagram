@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/'. $post->imagen }}" alt="Imagen del post {{ $post->titulo}}">
            <div  class="p-3 flex items-center " >
                @auth   

                    {{-- <livewire:like-post :post="$post" /> --}}
                   {{--  @livewire('like-post', ['post' => '$post']) --}}

                    @if( $post->checkLike(auth()->user()) )
                        <form action="{{route('posts.likes.destroy' , $post) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    class="h-6 w-6" 
                                    fill="red" 
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>    
                    @else
                        <form action="{{route('posts.likes.store' , $post) }}" method="post">
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                
                                    <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    class="h-6 w-6" 
                                    fill="white" 
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>        
                    @endif 
                    

                @endauth
                
                <p class="mx-3 font-bold"> {{$post->likes->count()}} 
                    <span class="font-normal">likes</span> </p>
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username}}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">{{ $post->descripcion}}</p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    {{-- <a href="{{route('posts.edit', $post)}}" class="bg-blue-500 hover:bg-blue-600 p-2 rounded text-white ">Editar Publicacion</a>--}}
                    
                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit"
                        value="Eliminar Publicacion"
                        class="bg-red-500 hover:bg-red-600 p-2 rounded text-white mt-4 cursor-pointer">
                    </form>   
                @endif
            @endauth
        </div>

        
        

        <div class="md:w-1/2 p-5" >
            
            <div class="shadow bg-white p-5 mb-5">

                @auth

                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo Comentario</p>
                    @if (session('mensaje'))
                        <div class="p-3 bg-green-500 text-white text-center rounded-lg mb-3 uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                        
                    @endif
                    <form action="{{ route('comentario.store', ['post' => $post, 'user' => $user]) }}"  method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="block mb-2 text-gray-700 uppercase">Anade Un Comentario</label>
                            <textarea type="text" name="comentario" id="comentario" 
                            placeholder="comentario de la Publicacion"
                            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        
                            > </textarea>   
                            @error('comentario')
                            <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                                {{$message}}
                            </p>
                            @enderror

                        </div>
                        <input type="submit"
                            value="Comentar"
                            class="w-full p-3 font-bold text-white transition-colors bg-blue-600 rounded-lg cursor-pointer hover:bg-sky-700 upercase"
                            />
                    </form>
                @endauth
                <div>
                    <p class="text-xl font-bold text-center mb-4">Comentarios</p>
                    @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario)
                    <div class="shadow bg-white p-5 mb-5">
                        <a href="{{route('posts.index', $comentario->user)}}" class="font-bold">
                            {{ $comentario->user->username}}
                        
                        </a>
                        
                        <p class="text-sm text-gray-500">
                            {{ $comentario->created_at->diffForHumans() }}
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ $comentario->comentario }}
                        </p>
                    </div>
                    @endforeach
                    @else
                        <p class="text-xl font-bold text-center mb-4">No hay comentarios</p>
                    @endif
                 
                
            </div>
        </div>
    </div>


@endsection
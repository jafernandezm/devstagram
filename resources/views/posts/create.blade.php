@extends('layouts.app')


@section('titulo')
    Crear una Nueva Publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> 
@endpush


@section('contenido')
    <div class="md:flex md:items-center">
        <div class="px-10 md:w-1/2">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data"
            id="dropzone" class="flex flex-col items-center justify-center w-full border-2 border-dashed rounded dropzone h-96">
            @csrf
            </form>
        </div>

        
        <div class="p-6 mt-10 bg-white rounded-lg shadow-xl md:w-1/2 px md:mt-0">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="block mb-2 text-gray-500 uppercase">Titulo</label>
                    <input type="text" name="titulo" id="titulo" 
                    placeholder="Tu titulo de la Publicacion"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{old('titulo')}}"
                    />   
                    @error('titulo')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{$message}}
                    </p>
                    @enderror
                </div>
               
                <div class="mb-5">
                    <label for="descripcion" class="block mb-2 text-gray-500 uppercase">Descripcion</label>
                    <textarea type="text" name="descripcion" id="descripcion" 
                    placeholder="descripcion de la Publicacion"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                   
                    >{{old('descripcion')}} </textarea>   
                    @error('descripcion')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input name="imagen"
                    type="hidden"
                    value="{{old('imagen')}}">
                    @error('imagen')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{$message}}
                    </p>
                    @enderror
                </div>
               
                
                <input type="submit"
                value="Crear Publicacion"
                class="w-full p-3 font-bold text-white transition-colors bg-blue-600 rounded-lg cursor-pointer hover:bg-sky-700 upercase"
                />

            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('titulo')
    Inicia Sesion en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="p-5 md:w-6/12" >
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login usuarios">
        </div>

        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12" >

            <form  method="POST" action="{{route('login')}}" novalidate>
                @csrf
                {{-- mensaje --}}
                @if (session('mensaje'))
                    <div class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{session('mensaje')}}
                    </div>
                @endif

                <div class="mb-5">
                    <label for="username">Email</label>
                    <input type="username" name="username" id="username" 
                    placeholder="Tu email"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{old('username')}}"
                    /> 
                </div>
                @error('username')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{$message}}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" 
                    placeholder="Tu password"
                    id="password" class="w-full p-3 border rounded-lg">
                </div>
                @error('password')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                    {{$message}}
                </p>
                @enderror
                
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Mantener mi sesion abierta</label>
                </div>

                <div class="mb-5">
                    <button type="submit" 
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700">Iniciar sesion</button>
                </div>
                

            </form>

        </div>
    </div>
@endsection

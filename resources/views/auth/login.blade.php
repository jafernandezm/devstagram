@extends('layouts.app')

@section('titulo')
    Inicia Sesion en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5" >
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl" >

            <form  method="POST" action="{{route('login')}}" novalidate>
                @csrf
                {{-- mensaje --}}
                @if (session('mensaje'))
                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{session('mensaje')}}
                    </div>
                @endif

                <div class="mb-5">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" 
                    placeholder="Tu email"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{old('email')}}"
                    /> 
                </div>
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" 
                    placeholder="Tu password"
                    id="password" class="border p-3 w-full rounded-lg">
                </div>
                @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{$message}}
                </p>
                @enderror
                
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Mantener mi sesion abierta</label>
                </div>

                <div class="mb-5">
                    <button type="submit" 
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                    font-bold w-full p-3 text-white rounded-lg">Iniciar sesion</button>
                </div>
                

            </form>

        </div>
    </div>
@endsection

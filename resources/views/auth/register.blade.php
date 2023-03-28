@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5" >
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl" >
            <form action="/crear-cuenta" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" 
                    placeholder="Tu nombre"
                    class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" name="username" id="username" 
                    placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" 
                    placeholder="Tu email"
                    class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" 
                    placeholder="Tu password"
                    id="password" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password_confirmation">Confirmar Password</label>
                    <input type="password" name="password_confirmation" 
                    placeholder="Confirma tu password"
                    id="password_confirmation" class="border p-3 w-full rounded-lg">
                </div>

                <div class="mb-5">
                    <button type="submit" 
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                    font-bold w-full p-3 text-white rounded-lg">Registrarse</button>
                </div>

            </form>
        </div>
    </div>
@endsection

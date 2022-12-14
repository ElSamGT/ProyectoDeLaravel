@extends('layouts.app')

@section('titulo')
    Inicia sesion
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5" >
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios">
        </div>
        <div class=" md:w-4/12 bg-white rounded-lg shadow-2xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (session('mensaje'))
                <p class="bg-red-500 text-white 
                my-2 rounded-lg text-sm p-2 
                text-center">
                {{ session('mensaje') }}</p>
                @endif

                <div class="p-2 pb-1 md:flex md:justify-around">
                    <label for="email" class="md:w-4/12 p-1 block uppercase text-gray-500 font-bold" >
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Email"
                        class="md:w-2/3 h-8 border p-2 w-full rounded-lg
                        @error('email') border-red-500    
                        @enderror "
                        value="{{old('email')}}"
                        />
                        @error('email')
                            <p class="bg-red-500 text-white 
                            my-2 rounded-lg text-sm p-2 
                            text-center">
                            {{ $message }}</p>
                        @enderror
                </div>
                <hr>
                <div class="p-2 pb-1 md:flex md:justify-around">
                    <label for="password" class="md:w-4/12 p-1 block uppercase text-gray-500 font-bold" >
                        Password
                    </label>
                    <input 
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                    class="md:w-2/3 h-8 border p-1 w-full rounded-lg
                    @error('password') border-red-500    
                    @enderror "
                    />
                    @error('password')
                            <p class="bg-red-500 text-white 
                            my-2 rounded-lg text-sm p-2 
                            text-center">
                            {{ $message }}</p>
                        @enderror
                </div>

                <div class="p-2 pb-1 md:flex md:justify-start">
                    <input type="checkbox" name="remember"> <label for="" class="p-1 text-gray-500 text-sm" >Mantener Sesion abierta</label>
                </div>

                <input 
                    type="submit" 
                    value="Iniciar Sesion" 
                    class=" bg-sky-600 hover:sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
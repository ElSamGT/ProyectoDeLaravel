@extends('layouts.app')

@section('titulo')
    Registrar Nuevo Usuario
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5" >
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
        </div>
        <div class=" md:w-4/12 bg-white rounded-lg shadow-2xl">
            <form action="{{ route('posts.registro') }}" method="POST">
                @csrf
                <div class=" p-2 md:flex md:justify-around">
                    <label for="nombre" class="md:w-4/12 p-1 block uppercase text-gray-500 font-bold">
                        Nombre 
                    </label>
                    <input 
                        id="nombre"
                        name="nombre"
                        type="text"
                        placeholder="Tu nombre"
                        class="md:w-2/3 h-8 border p-2 w-full rounded-lg 
                        @error('nombre') border-red-500    
                        @enderror "
                        value="{{old('nombre')}}"
                        />
                        @error('nombre')
                            <p class="bg-red-500 text-white 
                            my-1 rounded-lg text-sm p-2 
                            text-center">
                            {{ $message }}</p>
                        @enderror
                </div>
                <hr>
                <div class="p-2 md:flex md:justify-around">
                    <label for="paterno" class="md:w-4/12 p-1 block uppercase text-gray-500 font-bold">
                        Apellido Paterno
                    </label>
                    <input 
                        id="paterno"
                        name="paterno"
                        type="text"
                        placeholder="Apellido Paterno"
                        class="md:w-2/3 h-8 border p-2 w-full rounded-lg 
                        @error('paterno') border-red-500    
                        @enderror "
                        value="{{old('paterno')}}"
                        />
                        @error('paterno')
                            <p class="bg-red-500 text-white 
                            my-2 rounded-lg text-sm p-2 
                            text-center">
                            {{ $message }}</p>
                        @enderror
                </div>
                <hr>
                <div class="p-2 pb-1 md:flex md:justify-around">
                    <label for="materno" class="md:w-4/12 p-1 block uppercase text-gray-500 font-bold">
                        Apellido Materno
                    </label>
                    <input 
                        id="materno"
                        name="materno"
                        type="text"
                        placeholder="Apellido Materno"
                        class="md:w-2/3 h-8 border p-2 w-full rounded-lg 
                        @error('materno') border-red-500    
                        @enderror "
                        value="{{old('materno')}}"
                        />
                        @error('materno')
                            <p class="bg-red-500 text-white 
                            my-2 rounded-lg text-sm p-2 
                            text-center">
                            {{ $message }}</p>
                        @enderror
                </div>
                <hr>
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
                    <label for="username" class="md:w-4/12 p-1 block uppercase text-gray-500 font-bold" >
                        Usuario
                    </label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu usuario"
                        class="md:w-2/3 h-8 border p-1 w-full rounded-lg
                        @error('username') border-red-500    
                        @enderror "
                        value="{{old('username')}}"
                        />
                        @error('username')
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
                <hr>
                <div class="p-2 pb-1 md:flex md:justify-around">
                    <label for="password_confirmation" class="md:w-4/12 mb-1 p-1 block uppercase text-gray-500 font-bold" >
                        Repetir Password
                    </label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repite tu password"
                        class="md:w-2/3 h-8 border p-1 w-full rounded-lg"
                        />
                        @error('password_confirmation')
                            <p class="bg-red-500 text-white 
                            my-2 rounded-lg text-sm p-2 
                            text-center">
                            {{ $message }}</p>
                        @enderror
                </div>

                <input 
                    type="submit" 
                    value="Agregar Usuario" 
                    class=" bg-sky-600 hover:sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
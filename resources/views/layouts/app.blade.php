<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HazloEnG - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="bg-gray-100">
    <header class="p-3 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">
            HazloEnGrande
        </h1>
        
        @auth
        
        <nav class="flex gap-2 items-center">
           <a class="font-bold text-gray-600 text-sm" href="#"> 
                Hola <span class="font-normal">{{auth()->user()->username}}</span></a> 
            <form action="{{ route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesion</button>
            </form>
                
          
        </nav>
        </div>
        <div class="flex gap-1 items-center">
            <form action="{{ route('horarios')}}" method="POST">
                @csrf
                <button type="submit" class="mt-5 ml-20 font-bold uppercase text-gray-600 text-sm border-b-2 hover:border-b-8">Horarios</button>
                
            </form>
            
                <a class="btn mt-5 ml-20 font-bold uppercase text-gray-600 text-sm border-b-2 hover:border-b-8" href="{{ route('registro')}}">Registrar Usuarios</a>
               
          
            
        </div>



        @endauth

        @guest
        <nav class="flex gap-2 items-center">
            <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login')}}">Login</a>
        </nav>            
        @endguest
        
    </header>
    
    <main class="container mx-auto mt-5">
        <h2 class="font-black text-center text-3xl mb-5">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        HazloEnGrande - Todos los derechos reservados {{ now()->year}}
    </footer>

    

</body>

</html>
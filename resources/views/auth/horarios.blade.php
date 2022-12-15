@extends('layouts.app')


@section('contenido')
<div class="bg-white">
    <nav class="flex gap-2 items-center">
        <a class="bg-sky-600 hover:sky-700 transition-colors cursor-pointer uppercase font-bold w-2/12 p-3 text-white rounded-lg" href="{{ route('posts.create') }}">Crear Horario</a>
        <a class="bg-sky-600 hover:sky-700 transition-colors cursor-pointer uppercase font-bold w-2/12 p-3 text-white rounded-lg" href="{{ route('checar') }}">Checar Entrada</a>
        <a class="bg-sky-600 hover:sky-700 transition-colors cursor-pointer uppercase font-bold w-2/12 p-3 text-white rounded-lg" href="{{ route('reportes') }}">Reportes</a>
        
        
    </nav> 
</div>
<div class="bg-white ">
 
<div class="md:flex md:justify-center md:gap-10 md:items-stretch">
    
    <div class=" md:w-1/6 bg-lime-600 rounded-lg shadow-2xl">
        
    </div>
</div>



</div>
@endsection
@extends('layouts.app')


@section('contenido')

<?php

    date_default_timezone_set('america/mexico_city');

    function fecha(){



    $fecha_dia=date('d');

    $dia_esp=[
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miercoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sabado",
        "Sunday" => "Domingo"
    ];

    $dia_final=$dia_esp[date("l")];

    return $dia_final;
    }
?>


<div class="pl-3 md:w-12/12 bg-white rounded-lg shadow-2xl">
    <h1 class="text-3xl font-black"> Nuevo Horario</h1>
   

        <div class="md:w-6/6 p-2 md:flex md:justify-between">
            <div>
            <label for="idUser" class="md:w-6/6 p-1 block uppercase text-gray-500 font-bold" >
                
                <select id="idUser"
                        name="idUser"
                        class="md:w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        >
                    <option >--Usuario--</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->nombre}}</option>
                    @endforeach
                    </select>
            </label>
            </div>
            <div >
                <label for="idDia" id="idDia"  class="md:w-6/6 p-1 block uppercase text-gray-500 font-bold">
                    Fecha
                 </label>
                 <input type="idDia" id="idDia" value="<?php  echo date('d-m-Y h:i') ?>">Reporte 1
                 
            </div>
            <div >
                <label for="idDia" id="idDia"  class="md:w-6/6 p-1 block uppercase text-gray-500 font-bold">
                    Fecha
                 </label>
                 <input type="idDia" id="idDia" value="<?php  echo date('d-m-Y h:i') ?>">Reporte 1
                 
            </div>
            <div>

                <label for="horaentrada" class="md:w-6/6 p-1 block uppercase text-gray-500 font-bold">
                    Entrada
                 </label>
                 <div>
                    <?php echo date('h:i'); ?>
       
                 </div>
            </div>
            
            <a class="flex btn md:h-1/3 justify-center bg-green-600 hover:sky-700 transition-colors cursor-pointer uppercase font-bold w-2/12 p-3 text-white rounded-lg" href="{{ route('pdf') }}">Crear PDF</a>
            <a class="flex btn md:h-1/3 justify-center bg-green-600 hover:sky-700 transition-colors cursor-pointer uppercase font-bold w-2/12 p-3 text-white rounded-lg" href="{{ route('txt') }}">Leer TXT</a>
        
        
    
</div>

@endsection
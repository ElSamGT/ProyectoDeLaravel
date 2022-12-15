@extends('layouts.app')


@section('contenido')

<?php
use App\Models\dia;



date_default_timezone_set('america/mexico_city');

function dia(){

    

    $mysqli = new mysqli('localhost', 'root', '1234', 'pback');
    $query = $mysqli -> query ('SELECT id,nombre FROM dias;');
    
    if ($query->num_rows > 0) {
  // output data of each row

  foreach ($query as $q) {
   echo $q['id'];
  }
}

    
}
function fecha(){

    
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
    
    $dianum=[
        "Lunes"=>'1',
        "Martes"=>'2',
        "Miercoles"=>'3',
        "Jueves"=>'4',
        "Viernes"=>'5',
        "Sabado"=>'6',
        "Domingo"=>'7'
];
   /* 
   for ($i=0; $i < sizeOf($dianum); $i++) { 
    if ($dia_esp[$i]===$dianum) {
        return $dianum[$i];
    }
   }
   */
   $diaa=$dianum[$dia_final];


   return $diaa;

}
function fecha2(){

    
    $dia_esp=[
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miercoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sabado",
        "Sunday" => "Domingo"
    ];

    $mes_esp=[
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septriembre",
        "November" => "Noviembre",
        "December" => "Diciembre"
    ];
    
    $dia_fin=$dia_esp[date("l")];
    $mes_fin=$mes_esp[date("F")];
   

   return $dia_fin.' '.date('d').' de '.$mes_fin;

}
?>


<div class="pl-3 md:w-12/12 bg-white rounded-lg shadow-2xl">
    <h1 class="text-3xl font-black"> Checar Entrada</h1>
    
    <form method="POST" action="{{ route('checado') }}" novalidate>
        @csrf


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
                    Dia
                 </label>
                 <input type="idDia" name="idDia" id="idDia" value="{{fecha()}}" hidden>{{fecha2()}}
                 
            </div>

            <div>
                 <div>
                    <input
                    for 
         id="fecha"
         name="fecha"
         type="text"
         class="md:w-6/6 h-8 border p-2 rounded-lg"
         value="<?php echo date('Y-m-d') ?>"
         required
         hidden
         />

         
                 </div>
            </div>
            <div>

                <label for="horaentrada" class="md:w-6/6 p-1 block uppercase text-gray-500 font-bold">
                    Hora
                 </label>
                 <div>
                    <input 
         id="horaentrada"
         name="horaentrada"
         type="horaentrada"
         class="md:w-6/6 h-8 border p-2 rounded-lg"
         value="<?php echo date('h:i'); ?>"
         required
         hidden
         /><?php echo date('h:i'); ?>

         
                 </div>
            </div>
            
          
        <input 
            type="submit" 
            value="Checar" 
            class=" md:h-1/3  bg-green-600 hover:sky-700 transition-colors cursor-pointer uppercase font-bold w-2/12 p-3 text-white rounded-lg">
        </div>
    </form>
</div>

@endsection
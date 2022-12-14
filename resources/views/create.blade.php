@extends('layouts.app')


@section('contenido')


<div class="pl-3 md:w-12/12 bg-white rounded-lg shadow-2xl">
    <h1 class="text-3xl font-black"> Nuevo Horario</h1>
    
    <form method="POST" action="{{ route('creado') }}" novalidate>
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
            <div>
                <label for="idDia" class="md:w-6/6 p-1 block uppercase text-gray-500 font-bold">
                    Dia
                 </label>
                 <select id="idDia"
                 name="idDia"
                 class="md:w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                 >
             <option >--Selecciona Dia--</option>
             @foreach ($dias as $dia)
                 <option value="{{$dia->id}}">{{$dia->nombre}}</option>
             @endforeach
             </select>

            </div>
            <div>

                <label for="horaentrada" class="md:w-6/6 p-1 block uppercase text-gray-500 font-bold">
                    Entrada
                 </label>
                 <div>
                    <input 
         id="horaentrada"
         name="horaentrada"
         type="time"
         class="md:w-6/6 h-8 border p-2 rounded-lg"
         min="07:00"
         max="17:00"
         step="3600"
         value="07:00"
         required
         />
                 </div>
            </div>
            <div>

                <label for="horasalida" class="md:w-6/6 p-1 block uppercase text-gray-500 font-bold">
                    Salida
                 </label>
                 <div>
                    <input 
         id="horasalida"
         name="horasalida"
         type="time"
         class="md:w-6/6 h-8 border p-2 rounded-lg"
         min="07:00"
         max="17:00"
         step="3600"
         value="07:00"
         required
         />
                 </div>
            </div>
        
            
        <input 
            type="submit" 
            value="Crear" 
            class=" md:h-1/3  bg-green-600 hover:sky-700 transition-colors cursor-pointer uppercase font-bold w-2/12 p-3 text-white rounded-lg">
        </div>
    </form>
</div>

@endsection
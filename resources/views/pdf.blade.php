@extends('layouts.app')


@section('contenido')


<div class="pl-3 md:w-12/12 bg-white rounded-lg shadow-2xl">
    <h1 class="text-3xl font-black"> Reportes</h1>
    <table class="table table-striped table-hover">

        <thead>
            <tr>
                <th class="p-3">id</th>
                <th class="p-3">Usuario</th>
                <th class="p-3">Dia</th>
                <th class="p-3">Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checahoras as $checahora)
            
                
            <tr>
                <td>{{
                    $checahora->id
                    }}</td>
                <td>
                    {{
                        $checahora->idUser
                        }}
                    </td>
                    <td class="p-3">
                        
                           <?php echo date($checahora->fecha); ?>
                            
                        </td>
                        <td class="p-3" >

                            <?php echo date($checahora->horaentrada); ?>
                        </td>
                    
                </tr>
                
            @endforeach
        </tbody>
        <tbody>
            
        </tbody>
    </table>
    
</div>

@endsection
<?php

namespace App\Http\Controllers;

use App\Models\checahora;
use App\Models\dia;
use App\Models\horario;
use App\Models\User;
use Illuminate\Http\Request;

class CrearHorarioController extends Controller
{
    public function index(User $user)
    {

        return view('create', [
            'user' => $user,
        ]);
    }

    public function render(User $user)
    {
        $users = User::all();
        $dias = dia::all();

        return view('create', [
            'users' => $users,
            'dias' => $dias,

        ]);
    }
    public function store(Request $request)
    {


        horario::create([
            'idUser' => $request->idUser,
            'idDia' => $request->idDia,
            'horaentrada' => $request->horaentrada,
            'horasalida' => $request->horasalida,
        ]);
    }
}

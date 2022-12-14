<?php

namespace App\Http\Controllers;

use App\Models\dia;
use Illuminate\Http\Request;
use App\Models\User;

class HorariosController extends Controller
{
    public function index()
    {
        return view('auth.horarios');
    }

    public function render()
    {

        return view('auth.horarios', []);
    }
}

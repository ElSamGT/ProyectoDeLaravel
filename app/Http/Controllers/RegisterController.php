<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(User $user)
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // dd($request->get('email'));
        //MODIFICAR EL REQUEST
        $request->request->add(['username' => Str::slug($request->username)]);

        //VALIDACION
        $this->validate($request, [
            'nombre' => 'required|max:25',
            'paterno' => 'required|max:25',
            'materno' => 'required|max:25',
            'username' => 'required|unique:users|min:5|max:30',
            'email' => 'required|unique:users|email|max:50',
            'password' => 'required|confirmed|min:6',


        ]);

        User::create([
            'nombre' => $request->nombre,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Autenticar
        /*auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);*/
        $user = User::all();

        //Redireccionar
        return view('auth.register', [
            'user' => $user,
        ]);
    }
}

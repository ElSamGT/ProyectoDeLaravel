<?php

use App\Http\Controllers\ChecarController;
use App\Http\Controllers\CrearHorarioController;
use App\Http\Controllers\HorariosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Contracts\Routing\Registrar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name(('logg'));
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/dashboard', [PostController::class, 'index'])->name('posts.index');


Route::post('/registros', [RegisterController::class, 'store'])->name('posts.registro');
Route::get('/registro', [RegisterController::class, 'index'])->name('registro');


Route::post('/horarios', [HorariosController::class, 'index'])->name('horarios');
Route::post('/horarios', [HorariosController::class, 'render'])->name('horarios');
Route::get('/horarios/checar', [ChecarController::class, 'index'])->name('checar');
Route::post('/horarios/checar', [ChecarController::class, 'store'])->name('checado');
Route::get('/horarios/reportes', [ChecarController::class, 'indexR'])->name('reportes');
Route::get('/horarios/reportes/PDF', [ChecarController::class, 'pdf'])->name('pdf');
Route::get('/horarios/reportes/txt', [ChecarController::class, 'txt'])->name('txt');

Route::get('/horarios/create', [CrearHorarioController::class, 'index'])->name('create');
Route::get('/horarios/create', [CrearHorarioController::class, 'render'])->name('posts.create');
Route::post('/horarios/create', [CrearHorarioController::class, 'store'])->name('creado');

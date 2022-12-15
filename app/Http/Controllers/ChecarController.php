<?php

namespace App\Http\Controllers;


use mysqli;
use stdClass;
use App\Models\dia;
use App\Models\User;
use App\Models\horario;
use App\Models\checahora;
use App\Models\reportetxt;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;


date_default_timezone_set('america/mexico_city');

class ChecarController extends Controller
{

    public function index(User $user)
    {

        $users = User::all();
        $dias = dia::all();
        $horarios = horario::all();

        return view('checar', [
            'users' => $users,
            'dias' => $dias,
            'horarios' => $horarios,

        ]);
    }
    public function indexR(User $user)
    {

        $users = User::all();
        $dias = dia::all();
        $horarios = horario::all();

        return view('reportes', [
            'users' => $users,
            'dias' => $dias,
            'horarios' => $horarios,

        ]);
    }
    public function store(Request $request)
    {



        checahora::create([
            'idUser' => $request->idUser,
            'idDia' => $request->idDia,
            'horaentrada' => $request->horaentrada,
            'fecha' => $request->fecha,
        ]);

        $users = User::all();
        $dias = dia::all();
        $horarios = horario::all();

        return view('checar', [
            'users' => $users,
            'dias' => $dias,
            'horarios' => $horarios,

        ]);
    }
    public function pdf(User $user)
    {

        /*
        $pdf = App::make('dompdf.wrapper');
        return $pdf->download('invoice.pdf');*/

        $users = User::all();
        $dias = dia::all();
        $horarios = horario::all();
        $checahoras = checahora::all();

        $pdf = Pdf::loadView('pdf', [
            'checahoras' => $checahoras,
        ]);
        return $pdf->download('checahora.pdf');
    }
    public function txt(Request $request)
    {
        $fp = fopen(public_path("recursos/pruebaback.txt"), "r");
        $array = ['-', ' ', '|', 'ADVERTENCIA'];
        while (!feof($fp)) {

            $linea = fgets($fp);
            $array = explode("|", $linea);
            $repor = new stdClass();


            for ($c = 0; $c < sizeof($array); $c++) {
                $cadena_equipo =  $array[$c];



                if ($c === 0) {
                    $repor->id = $array[$c];
                }
                if ($c === 1) {
                    $repor->nombre = $array[$c];
                }
                if ($c === 2) {
                    $repor->fechatxt = $array[$c];
                }
            }

            $id = $repor->id;
            $nombre = $repor->nombre;
            $fechatxt = $repor->fechatxt;


            reportetxt::create([
                'nombre' => $nombre,
                'fechatxt' => $fechatxt,
            ]);
        }

        fclose($fp);

        $users = User::all();
        $dias = dia::all();
        $horarios = horario::all();

        return view('reportes', [
            'users' => $users,
            'dias' => $dias,
            'horarios' => $horarios,

        ]);
    }
    public function txtr1(Request $request)
    {



        $mysqli = new mysqli('localhost', 'root', '1234', 'pback');
        $reporte1 = $mysqli->query('SELECT id,nombre FROM dias;');

        if ($reporte1->num_rows > 0) {
            // output data of each row
        }
        foreach ($reporte1 as $q) {
            echo $q['id'];
        }


        $fp = fopen(public_path("recursos/pruebaback.txt"), "r");
        $array = ['-', ' ', '|', 'ADVERTENCIA'];
        while (!feof($fp)) {

            $linea = fgets($fp);
            $array = explode("|", $linea);
            $repor = new stdClass();


            for ($c = 0; $c < sizeof($array); $c++) {
                $cadena_equipo =  $array[$c];



                if ($c === 0) {
                    $repor->id = $array[$c];
                }
                if ($c === 1) {
                    $repor->nombre = $array[$c];
                }
                if ($c === 2) {
                    $repor->fechatxt = $array[$c];
                }
            }

            $id = $repor->id;
            $nombre = $repor->nombre;
            $fechatxt = $repor->fechatxt;


            reportetxt::create([
                'nombre' => $nombre,
                'fechatxt' => $fechatxt,
            ]);
        }

        fclose($fp);

        $users = User::all();
        $dias = dia::all();
        $horarios = horario::all();

        return view('reportes', [
            'users' => $users,
            'dias' => $dias,
            'horarios' => $horarios,

        ]);
    }
}

<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dia;
use App\Models\User;
use App\Models\horario;
use App\Models\checahora;
use App\Models\reportetxt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use stdClass;


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



            echo "<br>";
            echo "<br>";
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
            var_dump($repor->id);
            var_dump($repor->nombre);
            var_dump($repor->fechatxt);

            $id = $repor->id;
            $nombre = $repor->nombre;
            $fechatxt = $repor->fechatxt;


            reportetxt::create([
                'nombre' => $nombre,
                'fechatxt' => $fechatxt,
            ]);
        }




        /*


            
        while (!feof($fp)) {
            $linea = fgets($fp);
            $c = 0;
            foreach ($array as $r) {
                if (trim($linea) != "ADVERTENCIA")

                    if (strripos($linea, $r)) :
                        echo $linea;
                    else :
                        $c++;
                        if ($c == count($array)) :
                            echo $linea;
                            //Tabla
                            $n = new reportetxt();
                            $n->nombre = $linea;
                            $n->fechatxt = $linea;
                            $n->save();
                            $c = 0;


                        endif;
                    endif;
            }
        }
        */
        fclose($fp);
    }
}

<?php

namespace App\Http\Controllers;

use App\TrainingDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingDateController extends Controller
{
    #Funcao que guarda o ate que dia vai o treino
    public function storeTrainingDayOf($id, $dataTroca)
    {
        #Pegando a data atual para comparar
        $dataAtual = date('Y-m-d');

        if(strtotime($dataTroca) > strtotime($dataAtual)){
            DB::table('trainingdate')
                ->insert(
                    array('idusuario' => $id, 'datatroca' => $dataTroca)
                );
            return 'true';
        }
        else{
            return 'false';
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    #Funcao que lista o treino do aluno, e pega o professor do aluno
    public function showTraining()
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['Faca o login!']);
        }


        $id = session('id');
        $treino = DB::table('training_has_exercises')
            ->join('physicalexercises', 'training_has_exercises.idexercicio', '=', 'physicalexercises.id')
            ->join('trainingsheets', 'training_has_exercises.idficha', '=', 'trainingsheets.id')
            ->join('users', 'trainingsheets.idusuario', '=', 'users.id')
            ->select(
                'physicalexercises.nome as exercicio',
                'physicalexercises.areamuscular',
                'training_has_exercises.serie',
                'training_has_exercises.repeticao',
                'training_has_exercises.intervalo',
                'training_has_exercises.obs'
            )
            ->where('training_has_exercises.idficha', '=', $id)
            ->get();

        $treinador = DB::table('trainingsheets')
            ->select('treinador')
            ->where('idusuario', '=', $id)
            ->first();

        return view('aluno.mostrarTreino', [
            'treino' => $treino,
            'treinador' => $treinador
        ]);
    }
}

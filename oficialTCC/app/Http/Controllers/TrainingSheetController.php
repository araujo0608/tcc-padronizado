<?php

namespace App\Http\Controllers;

use App\TrainingSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingSheetController extends Controller
{
    #Funcao que automatiza a tabela trainingsheets
    public function store($idusuario, $treinador)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        $ts = new TrainingSheet();
        $ts->idusuario = $idusuario;
        $ts->treinador = $treinador;
        $ts->save();
    }

    #Funcao que insere um novo treinador pro usuario selecionado
    public function storeNewProf($id, $treinador)
    {

        DB::table('trainingsheets')
            ->where('idusuario', '=', $id)
            ->update(['treinador' => $treinador]);

        return redirect()->route('professor.homepage');
    }

    #Funcao que lista os alunos do professor
    public function listStudentOf($treinador)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

             $alunos = DB::table('users')
            ->join('trainingsheets', 'users.id', '=', 'trainingsheets.idusuario')
                 ->where('trainingsheets.treinador', '=', $treinador)
            ->select('users.nome', 'users.email', 'users.id')
            ->get();

             return view('professor.listarAlunos', [
                 'alunos' => $alunos
             ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\TrainingSheet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfController extends Controller
{
    #Funcao que escolhe o aluno que o professor escolheu na view
    public function choose(Request $request)
    {
        $ts = new TrainingSheetController();

        #chamando a funcao que guarda no bd
        $ts->storeNewProf($request->id, $request->treinador);

        return redirect()->route('professor.homepage');
    }

    #Funcao que lista todos os alunos
    public function listStudents(){
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        $users = DB::table('trainingsheets')
            ->join('users', 'users.id', '=', 'trainingsheets.idusuario')
            ->select('users.id','users.nome', 'users.email', 'users.acesso')
            ->where('treinador', '<>', session('nome'))
            ->get();

        return view('professor.escolherAluno', [
            'users' => $users,
            ]);
    }

    #Este metodo faz o logout (destruindo todas as sessoes atuais)
    public function logout()
    {
        session()->flush();
        return redirect()->route('aluno.login');
    }
}

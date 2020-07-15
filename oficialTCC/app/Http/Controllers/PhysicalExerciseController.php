<?php

namespace App\Http\Controllers;

use App\PhysicalExercise;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhysicalExerciseController extends Controller
{
    #Funcao que lista todos os exercicios fisicos do banco de dados
    public function listExercises($id)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        $exe = PhysicalExercise::all();
        $user = DB::table('users')->where('id', '=', $id)->first();
        return view('professor.montarTreino', [
            'exercicios' => $exe,
            'user' => $user
        ]);
    }

    #Funcao que insere exercicios no banco de dados
    public function storeExercise(Request $request){

        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        if ($request){
            $exe = new PhysicalExercise();
            $exe->nome = $request->nome;
            $exe->areamuscular = $request->area;
            $exe->aparelho = $request->aparelho;
            $exe->letra = $request->letra;

            $exe->save();

            return redirect()->route('adm.cadastro.exercicios')->withInput()->withErrors(['cadastrado com sucesso!']);
        }
        else{
            return redirect()->route('adm.cadastro.exercicios')->withInput()->withErrors(['erro no cadastro!']);
        }


    }

}

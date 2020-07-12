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
}

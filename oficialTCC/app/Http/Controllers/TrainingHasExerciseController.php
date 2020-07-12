<?php

namespace App\Http\Controllers;

use App\Training_has_exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingHasExerciseController extends Controller
{
    #Funcao que mostra o treino do usuario escolhido
    public function showTrainingOf($id)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        #Funcao que seleciona o treino do devido usuario
        $sql = DB::table('training_has_exercises')
            ->join('physicalexercises', 'training_has_exercises.idexercicio', '=', 'physicalexercises.id')
            ->join('trainingsheets', 'training_has_exercises.idficha', '=', 'trainingsheets.id')
            ->join('users', 'trainingsheets.idusuario', '=', 'users.id')
            ->select(
                'physicalexercises.nome as exercicio',
                'physicalexercises.areamuscular',
                'training_has_exercises.serie',
                'training_has_exercises.repeticao',
                'training_has_exercises.intervalo',
                'training_has_exercises.obs',
                'users.nome as nome'
            )
            ->where('training_has_exercises.idficha', '=', $id)
            ->get();

        return view('professor.mostrarTreino', [
            'obj' => $sql
        ]);
    }

    #Metodo que deleta ficha de determinado usuario
    public function deleteTraining($id)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }
        DB::table('training_has_exercises')
            ->where('idficha', '=', $id)
            ->delete();
    }

    #Metodo que de fato insere no banco os exercicios escolhidos
    public function store($treinos_selecionados, $idFicha, $series, $repeticoes, $intervalos, $obs)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }
        $obj = new Training_has_exercise();

        $obj->idexercicio = $treinos_selecionados;
        $obj->idficha = $idFicha;
        $obj->serie = $series;
        $obj->repeticao = $repeticoes;
        $obj->intervalo = $intervalos;
        $obj->obs = $obs;

        # Salvando no banco
        if ($obj->save()) {
            return true;
        } else {
            return false;
        }
    }

    #Metodo que reajanja os vetores bugantes e chama a funcao acima para inserir no bd
    public function createTraining(Request $request)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }
        $idficha = $request->id;
        $hidden = $request->invisivel;
        $caixas = $request->caixas;
        $series = $request->serie;
        $repeticoes = $request->repeticao;
        $intervalos = $request->intervalo;
        $obs = $request->obs;

        $this->deleteTraining($idficha);

        # Preenchendo vetor com valor nulo
        for ($i = 0; $i < count($hidden); $i++) {
            $treinos_selecionados[$i] = "nulo";
        }

        # Jogando os valores em comum entre o vetor hidden e caixas no vetor treinos_selecionados
        # Ou seja, o vetor treinos_selecionados ficara com valores nulos, exceto aqueles que ele marcou com na check-box
        for ($a = 0; $a < count($caixas); $a++) {
            for ($b = 0; $b < count($hidden); $b++) {
                if ($caixas[$a] == $hidden[$b]) {
                    $treinos_selecionados[$b] = $hidden[$b];
                }
            }
        }

        $status = [];

        $cont = 0;
        while ($cont < count($hidden)) {

            # Aqui, ele verifica se esta com valor nulo. Quando nao estiver significa que ele marcou essa check-box
            if ($treinos_selecionados[$cont] != 'nulo') {
                $status[$cont] = $this->store($treinos_selecionados[$cont], $idficha, $series[$cont], $repeticoes[$cont], $intervalos[$cont], $obs[$cont]);
            }
            $cont++;
        }

        return redirect()->route('prof.homepage.mostrarTreino', $idficha);
    }
}

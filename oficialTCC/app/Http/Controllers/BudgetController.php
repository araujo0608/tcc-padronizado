<?php

namespace App\Http\Controllers;

use App\Budget;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\crypto_sign_secretkey;

class BudgetController extends Controller
{
    #Funcao que chama o popUp na outra view
    public function viewPopUp(Request $request){

        $users = DB::table('users')
            ->where('acesso', '=', '0')
            ->get();

        return view('adm.popupUsuarioOrcamento', [
            'dados' => $request,
            'usuarios' => $users
        ]);
    }

    #Funcao que guarda o orcamento no bd
    public function storeBudget(Request $request)
    {
        if($request){
            $budget = new Budget();
            $budget->idusuario = $request->idusuario;
            $budget->preco = $request->preco;
            $budget->vencimento = $request->vencimento;
            $budget->situacao = 'pendente';
            $budget->dataPagamento = $request->vencimento;
            $budget->save();
            return redirect()->route('adm.orcamento');
        }else{
            return redirect()->back()->withInput()->withErrors(['Erro na requisicao']);
        }

    }

    #Funcao que lista os orcamentos dos devidos usuarios no bd
    public function listAllBudget()
    {
        $marvel =
            DB::table('budget')
                ->join('users', 'budget.idusuario', '=', 'users.id')
                ->select(
                    'users.id',
                            'users.nome',
                            'users.email',
                            'budget.preco',
                            'budget.vencimento',
                            'budget.situacao'
                )
                ->orderBy('vencimento')
                ->get();

        //dd($marvel);
        return view('adm.listarOrcamento', [
            'dados' => $marvel
        ]);
    }

    #Funcao que traz view para editar o orcamento
    public function viewEditBudget(Request $request)
    {
        return view('adm.edicaoOrcamento', [
            'dados' => $request
        ]);
    }

    #Funcao que edita o orcamento
    public function editBudget(Request $request)
    {
        if($request){
            $generalAmerica = DB::table('budget')
                ->where('idusuario',  $request->idusuario)
                ->update([
                    'preco' => $request->novopreco,
                    'vencimento' => $request->novovencimento
                ]);

            return redirect()->route('adm.orcamento.listar');
        }
        else{
            echo "Erro de requisicao";
        }

    }
}

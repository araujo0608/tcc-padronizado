<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    #Funcao que chama o popUp na outra view
    public function viewPopUp(Request $request){
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        #Pegando data de hoje
        $dataAtual = date('Y-m-d');

     if(strtotime($request->vencimento) < strtotime($dataAtual)){
        return redirect()->back()->withInput()->withErrors(['A data de vencimento nao pode ser anterior ao dia de hoje!']);
    }

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
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

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

    #Funcao que efetua o pagamento do usuario
    public function pay(Request $request)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        if($request){
            #Pegando data de hoje
            $dataAtual = date('Y-m-d');

        $ant_man = DB::table('budget')
        ->where('idusuario', '=', $request->idusuario)
        ->update([
            'situacao' => 'pago',
            'dataPagamento' => $dataAtual
        ]);
        return redirect()->route('adm.orcamento.listar');

        }else{
            echo "Erro de requisicao";
        }
    
    }


    #Funcao que lista os orcamentos pendentes dos devidos usuarios no bd
    public function listAllBudgetPending()
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

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
                ->where('situacao', '=', 'pendente')
                ->get();

        //dd($marvel);
        return view('adm.listarOrcamento', [
            'dados' => $marvel
        ]);
    }

    #Funcao que lista os orcamentos pagos dos devidos usuarios
    public function listaAllBudgetPaid()
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        $spider_man = DB::table('budget')
            ->join('users', 'budget.idusuario', '=', 'users.id')
            ->select(
                'users.id',
                        'users.nome',
                        'users.email',
                        'budget.preco',
                        'budget.dataPagamento',
                        'budget.vencimento',
                        'budget.situacao'
            )
            ->orderBy('vencimento')
            ->where('situacao', '=', 'pago')
            ->get();

            return view('adm.listarOrcamentosPagos', [
                'dados' => $spider_man
            ]);
    }

    #Funcao que traz view para editar o orcamento
    public function viewEditBudget(Request $request)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        return view('adm.edicaoOrcamento', [
            'dados' => $request
        ]);
    }

    #Funcao que edita o orcamento
    public function editBudget(Request $request)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        if($request){      
            $jesusHumilhaSatanas = DB::table('budget')
                ->where([
                    ['idusuario', '=', $request->idusuario],
                    ['vencimento', '=', $request->velhovencimento],
                    ['preco', '=', $request->velhopreco]
                    ])
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

    #Funcao que deleta o orcamento do banco de dados
    public function delBudget(Request $request){
        
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        $sql = DB::table('budget')->where([
            ['idusuario', '=', $request->idusuario],
            ['vencimento', '=', $request->vencimento],
            ['preco', '=', $request->preco]
            ])
            ->delete();

        if($sql){
            return redirect()->route('adm.orcamento.listar');
        }
        else {
            echo "erro na delecao do usuario ".$request->id;
        }
    }
}

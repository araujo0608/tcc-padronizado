<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmController extends Controller
{
    #Funcao que busca o adm no banco
    public function findADM()
    {
        $sql = DB::table('users')
            ->where('acesso', '=', '2')
            ->first();

        if($sql == null){
            return redirect()->route('adm.cadastro');
        }
        else{
            return redirect()->route('site.welcome');
        }
    }

    #Funcao que guarda um adm no banco
    public function storeADM(Request $request)
    {
        $adm = new User();
        $adm->email = $request->email;
        $adm->password = $request->password;
        $adm->acesso = '2';
        $adm->save();

        $ts = new TrainingSheetController();
        $ts->store(1, 'nenhum');

        return redirect()->route('adm.find');
    }

    #Funcao que cadastra um professor
    public function storeProf(Request $request)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        $user = new User();
        $user->nome = $request->nome;

        if(User::where('email', '=', $request->email)->exists()){
            return back()->with('error', 'Ja existe esse email cadastrado!');
        }
        else{
            $user->email = $request->email;
        }

        $user->password = $request->password;
        $user->acesso = '1';
        $user->nascimento = $request->nascimento;
        $user->cpf = $request->cpf;
        $user->celular = $request->celular;

        $user->save();

        $ts = new TrainingSheetController();
        $ts->store($user->id, 'nenhum');

        return redirect()->route('adm.principal');
    }

    #Funcao que lista os usuario do banco de dados
    public function listAllUsers()
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        $sql = User::all();

        return view('adm.listarUsuarios' , [
            'users' => $sql
        ]);
    }

    #Funcao que deleta um usuario do banco de dados
    public function del(Request $request)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        $sql = DB::table('users')->where('id', '=', $request->id)->delete();

        if($sql){
            return redirect()->route('adm.listar');
        }
        else {
            echo "erro na delecao do usuario ".$request->id;
        }

    }

    #Funcao que direciona para a pagina de edicao, com os respectivos
    #dados do usuario
    public function viewEditing(User $user)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        return view('adm.edicao', [
            'user'=>$user
        ]);
    }

    #Funcao que de fato faz a edicao
    public function edit(Request $request, User $user)
    {
        #Verificando se tem uma sessao autenticada para logar
        if(!session('auth')){
            return redirect()->route('aluno.login')->withInput()->withErrors(['faca login !']);
        }

        if($request){
            $user->nome = $request->nome;

            if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                $user->email = $request->email;
            }

            if(!empty($request->password)){
                $user->password = $request->password;
            }

            if(!empty($request->cpf)){
                $user->cpf = $request->cpf;
            }

            if(!empty($request->celular)){
                $user->celular = $request->celular;
            }

            $user->nascimento = $request->nascimento;
            $user->acesso = $request->acesso;

            $user->save();
            return redirect()->route('adm.listar');
        }
        else{
            return redirect()->back()->withInput()->withErrors(["Erro de edicao!"]);
        }

    }

}

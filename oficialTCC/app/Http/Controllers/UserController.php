<?php

namespace App\Http\Controllers;

use App\TrainingSheet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class UserController extends Controller
{
    #Funcao que insere usuario no banco de dados
    public function storeUser(Request $request)
    {
        if($request){
            $user = new User();
            $user->nome = $request->nome;

            if(User::where('email', '=', $request->email)->exists()){
                return back()->with('error', 'Ja existe esse email cadastrado!');
            }
            else{
                $user->email = $request->email;
            }

            $user->password = $request->password;
            $user->cpf = $request->cpf;
            $user->nascimento = $request->nascimento;
            $user->celular = $request->celular;
            $user->save();

             $ts = new TrainingSheet();
             $ts->idusuario = $user->id;
             $ts->treinador = 'nenhum';
             $ts->save();

            return redirect()->route('aluno.login');
        }
        else{
            echo "Erro na hora do cadastro!";
        }

    }

    #Funcao que faz o login do usuario (aluno) no site
    public function login(Request $request)
    {
        if($request){
            //dd($request);
            if(User::where('email', '=', $request->email)->exists()){

                $sql = DB::table('users')
                    ->select('password')
                    ->where('email', '=', $request->email)
                    ->first();

                if($sql != null){

                    if($request->password == $sql->password){
                        #Caso chegue aqui, significa que a senha e o email estao corretos

                       $user = User::where('email', '=', $request->email)->first();

                       if($user->acesso == '1'){
                           echo "Professor";
                           session_start();
                           session([
                               'id' => $user->id,
                               'nome' => $user->nome,
                               'email' => $user->email,
                               'acesso' => $user->acesso,
                               'auth'=> 'true'
                           ]);
                           return redirect()->route('professor.homepage');

                       }
                       elseif ($user->acesso == '2')
                       {
                           echo "ADM";
                           session_start();
                           session([
                               'id' => $user->id,
                               'nome' => $user->nome,
                               'email' => $user->email,
                               'acesso' => $user->acesso,
                               'auth'=> 'true'
                           ]);
                           return redirect()->route('adm.principal');
                       }
                       else
                       {
                           echo "Aluno";

                           session_start();
                           session([
                               'id' => $user->id,
                               'nome' => $user->nome,
                               'email' => $user->email,
                               'acesso' => $user->acesso,
                               'auth'=> 'true'
                           ]);

                           return redirect()->route('aluno.homepage');
                       }


                    }
                    else{
                        echo "Senha errada";
                        return redirect()->back()->withInput()->withErrors(['Senha errada parceiro!']);
                    }

                }
                else{
                    echo "consultar retornou null";
                }

            }
            else{
              echo "Email nao existe!";
              return redirect()->back()->withInput()->withErrors(["Email nao cadastrado!"]);
            }

            }else {
                echo "Erro na request";
                //return redirect()->back()->withInput()->withErrors(['dados invalidos !']);
            }

    }

    #Este metodo faz o logout (destruindo todas as sessoes atuais)
    public function logout()
    {
        session()->flush();
        return redirect()->route('aluno.login');
    }

}

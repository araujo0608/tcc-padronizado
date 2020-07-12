<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Site
# === Metodos que retornam views ===
Route::get('/welcome', function () {
    return view('site.welcome');
})->name('site.welcome');
# ====================================
// Fim-site


// Aluno
# === Metodos que retornam views ===

# ====================================

Route::get('/aluno/login/mostrarTreino', 'AlunoController@showTraining')->name('aluno.mostrarTreino');
// Fim-aluno


// ADM

# === Metodos que retornam views ===
Route::get('/adm/cadastro', function () {
    return view('adm.cadastro');
})->name('adm.cadastro');

Route::get('/adm/principal', function () {
    return view('adm.principal');
})->name('adm.principal');

Route::get('/adm/cadastro/professor', function () {
    return view('adm.cadastroProf');
})->name('adm.cadastro.professor');

Route::get('/adm/listar', 'AdmController@listAllUsers')
    ->name('adm.listar');

Route::get('/adm/listar/edicao/{user}', 'AdmController@viewEditing')
    ->name('adm.listar.edicao');
# ====================================

Route::get('/', 'AdmController@findADM')->name('adm.find');

Route::post('/adm/cadastro/realizar', 'AdmController@storeADM')
    ->name('adm.cadastro.realizar');
Route::post('/adm/cadastro/professor/realizar', 'AdmController@storeProf')
    ->name('adm.cadastro.professor.realizar');

Route::delete('/adm/listar/deletar', 'AdmController@del')
    ->name('adm.listar.deletar');

Route::put('/adm/listar/deletar/realizar/{user}', 'AdmController@edit')
    ->name('adm.listar.deletar.realizar');


//Fim-adm


// Aluno

# === Metodos que retornam views ===
Route::get('/aluno/homepage', function () {
    #Verificando se tem uma sessao autenticada para logar
    if(!session('auth')){
        return redirect()->route('aluno.login')->withInput()->withErrors(['ops! aqui nao parceiro']);
    }
    else{
        return view('aluno.homepage');
    }

})->name('aluno.homepage');

Route::get('/aluno/login', function () {
    return view('aluno.login');
})->name('aluno.login');

# ====================================


Route::post('/aluno/cadastro/realizar', 'UserController@storeUser')
    ->name('aluno.cadastro.realizar');

Route::post('/aluno/login/realizar', 'UserController@login')
    ->name('aluno.login.realizar');

Route::get('/aluno/homepage/logout', 'UserController@logout')
    ->name('aluno.homepage.logout');

//Fim-aluno


// Professor

# === Metodos que retornam views ===
Route::get('/professor/homepage', function () {
    #Verificando se tem uma sessao autenticada para logar
    if(!session('auth')){
        return redirect()->route('aluno.login')->withInput()->withErrors(['faca o login!']);
    }
    else{
        return view('professor.homepage');
    }

})->name('professor.homepage');

# ====================================

Route::get('/professor/homepage/listarAlunos/{treinador}', 'TrainingSheetController@listStudentOf')
    ->name('professor.homepage.listarAlunos');

Route::get('/professor/homepage/escolherAluno', 'ProfController@listStudents')
    ->name('professor.homepage.escolher');

Route::get('/prof/homepage/logout', 'ProfController@logout')
    ->name('prof.homepage.logout');

Route::post('/prof/homepage/escolherAluno/realizar', 'ProfController@choose')
    ->name('prof.homepage.escolherAluno.realizar');

//Fim-professor

// Treinos tem exercicios

# === Metodos que retornam views ===
Route::get(
    '/prof/homepage/mostrarTreino/{id}',
    'TrainingHasExerciseController@showTrainingOf'
)->name('prof.homepage.mostrarTreino');

Route::get('/prof/homepage/montarTreino/{id}', 'PhysicalExerciseController@listExercises')
    ->name('prof.homepage.montarTreino');
# ====================================

Route::post('/prof/homepage/montarTreino/realizar',
    'TrainingHasExerciseController@createTraining')
    ->name('prof.homepage.montarTreino.realizar');

//Fim-treinos tem exercicios


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title> Novo professor </title>
</head>
<body>

<h1>Professor</h1>
<h3>cadastre um novo professor</h3>

<form action="{{ route('adm.cadastro.professor.realizar') }}" method="post">

    @csrf

    @if(session()->has('error'))
        <div class="alert alert-warning">
            {{ session()->get('error') }}
        </div>
    @endif

    Nome: <input type="text" name="nome" id="nome" required>
    CPF: <input type="text" name="cpf" id="cpf" required maxlength="11">
    Data de nascimento: <input type="date" name="nascimento" id="nascimento" required>
    Telefone: <input type="text" name="celular" id="celular" required maxlength="11">
    Email: <input type="email" name="email" id="email" required>
    Senha:  <input type="password" name="password" id="password" required>

    <br>

    <button type="submit">Cadastrar</button>
</form>

<br>
<br>
<a href="{{ route('adm.principal') }}"> <button><---</button> </a>

<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

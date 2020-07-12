<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title>Home page</title>
</head>
<body>
<navbar>
    <a href="{{ route('aluno.login') }}"> <button class="btn btn-info">login/cadastro</button> </a>
</navbar>
    <h1> Tela de bem-vindo </h1>


<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

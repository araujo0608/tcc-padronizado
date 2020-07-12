<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title>Bem vindo - {{ session('nome') }}</title>
</head>
<body>
<a href="{{ route('aluno.mostrarTreino') }}"> <button> Listar seu treino </button> </a>
<a href="{{ route('aluno.homepage.logout') }}">logout</a>

<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

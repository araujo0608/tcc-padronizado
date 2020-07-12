<!doctype html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title>Painel do adm</title>
</head>
<body>
    <h1> Painel de administracao </h1>

    <a href="{{ route('adm.cadastro.professor') }}"><button> Cadastrar novo professor </button></a>
    <a href="{{ route('adm.listar') }}"><button> Listar usuarios </button></a>
    <a href="{{ route('aluno.homepage.logout') }}">logout</a>

    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

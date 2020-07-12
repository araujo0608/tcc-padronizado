<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem vindo - {{ session('nome') }}</title>
</head>
<body>
    <h1> Professor {{ session('nome') }}</h1>
    <a href="{{ route('professor.homepage.escolher') }}"><button>escolher aluno</button></a>
    <a href="{{ route('professor.homepage.listarAlunos', session('nome')) }}"><button>meus alunos</button></a>
    <a href="{{ route('prof.homepage.logout') }}">logout</a>

    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title> Ficha - {{ session('nome') }} </title>
</head>
<body>
    <h1> Ficha de treino </h1>

    <h3>Treinador: {{ $treinador->treinador }}</h3>
    <table border="2">
        <tr>
            <th>Exercicio</th>
            <th>Area</th>
            <th>Serie</th>
            <th>Repeticao</th>
            <th>Intervalo (em segundos)</th>
            <th>Obs</th>
        </tr>

        @foreach($treino as $sql)
            <tr>
                <td>{{ $sql->exercicio }}</td>
                <td>{{ $sql->areamuscular }}</td>
                <td>{{ $sql->serie }}</td>
                <td>{{ $sql->repeticao }}</td>
                <td>{{ $sql->intervalo }}</td>
                <td>{{ $sql->obs }}</td>
            </tr>
        @endforeach
    </table>

    <br>
    <br>
    <a href="{{ route('aluno.homepage') }}"> <button><---</button> </a>

    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

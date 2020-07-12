<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Treino</title>
</head>
<body>
    <h2>Ficha de treino</h2>

    @if(count($obj) <= 0)
        <p>É preciso que algum professor monte seu treino</p>
    @else
        <h3>Treinador: {{ session('nome') }}</h3>
        <h3>
            Aluno:
            @foreach($obj as $sql)
                {{ $sql->nome }}
                @break
            @endforeach
        </h3>

        <table border="2">
            <tr>
                <th>Exercicio</th>
                <th>Area</th>
                <th>Serie</th>
                <th>Repeticao</th>
                <th>Intervalo (em segundos)</th>
                <th>Obs</th>
            </tr>

            @foreach($obj as $sql)
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
    @endif

    <br>
    <br>
    <a href="{{ route('professor.homepage.listarAlunos', session('nome')) }}"> <button><---</button> </a>

    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

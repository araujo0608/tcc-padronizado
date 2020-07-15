<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lista de exercicios </title>
</head>
<body>

    <h1>Lista de exercicios</h1>

    <table border="2">
        <tr>
            <th> # </th>
            <th> Nome </th>
            <th> Area muscular </th>
            <th> Aparelho </th>
            <th> Letra </th>
            <th>Acao01</th>
            <th>Acao02</th>
        </tr>

        @foreach($exercicios as $exercicio)
            <tr>
                <td>{{ $exercicio->id }}</td>
                <td>{{ $exercicio->nome }}</td>
                <td>{{ $exercicio->areamuscular }}</td>
                <td>{{ $exercicio->aparelho}}</td>
                <td>{{ $exercicio->letra }}</td>
                <td><a href="{{ route('adm.listar.edicao.exercicio', $exercicio->id) }}"><button>editar</button></a></td>
                <td><a href=""><button>excluir</button></a></td>
            </tr>
        @endforeach
    </table>

</body>
</html>

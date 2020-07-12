<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Alunos do(a) {{ session('nome') }} </title>
</head>
<body>
    <h3> Esses sao seus alunos  </h3>

    <table border="2">
        <tr>
            <th> Nome </th>
            <th> Email </th>
            <th> Acao01 </th>
            <th> Acao02 </th>
        </tr>
        @foreach($alunos as $aluno)

            <tr>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->email }}</td>
                <td><a href="{{ route('prof.homepage.montarTreino', $aluno->id) }}"><button> montar treino </button></a></td>
                <td><a href="{{ route('prof.homepage.mostrarTreino', $aluno->id) }}"><button> treino atual </button></a></td>
            </tr>
        @endforeach
    </table>

    <br>
    <br>
    <a href="{{ route('professor.homepage') }}"> <button><---</button> </a>

    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

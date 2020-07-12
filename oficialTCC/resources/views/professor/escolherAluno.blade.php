<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escolha do aluno</title>
</head>
<body>
    <h1>Escolhe seu novo aluno, {{ session('nome') }}</h1>

    <table border="2">
        <tr>
            <th> Nome do aluno </th>
            <th> Email </th>
            <th> Acao </th>
        </tr>
        @foreach($users as $user)

            @if($user->nome != session('nome') && $user->acesso == '0')

                <tr>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('prof.homepage.escolherAluno.realizar') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                            <input type="hidden" name="treinador" id="treinador" value="{{ session('nome') }}">
                            <button type="submit">escolher</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
    <br>
    <br>
    <a href="{{ route('professor.homepage') }}"> <button><---</button> </a>

    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

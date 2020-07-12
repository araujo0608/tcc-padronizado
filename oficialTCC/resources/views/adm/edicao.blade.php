<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title>Edicao</title>
</head>
<body>
    <h1>Modo edicao</h1>

    <h4> preencha os campos com os novos valores </h4>
    <hr>

    <!--  route('users.edit.do', ['user' => $user])  -->
    <form action="{{ route('adm.listar.deletar.realizar', ['user' => $user]) }}" method="post">
        @csrf
        @method('PUT')

        @if($errors->all())
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif

        <p>
            Nome: <input type="text" name="nome" id="nome" value="{{ $user->nome }}" required>
        </p>

        <p>
            Email: <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </p>

        <p>
            Senha: <input type="password" name="password" id="password" placeholder="digite uma nova senha" required>
        </p>

        <p>
            Nascimento: <input type="date" name="nascimento" id="nascimento" value="{{ $user->nascimento }}">
        </p>

        <p>
            CPF: <input type="text" name="cpf" id="cpf" required maxlength="11" value="{{ $user->cpf }}">
        </p>

        <p>
            Celular: <input type="text" name="celular" id="celular" required maxlength="11" value="{{ $user->celular }}">
        </p>

        <p>
            Mudar cargo:
            @if($user->acesso == '0')
                <input type="radio" name="acesso" id="acesso" value="1"> Professor
                <input type="radio" name="acesso" id="acesso" value="0" checked> Aluno
            @else
                <input type="radio" name="acesso" id="acesso" value="1" checked> Professor
                <input type="radio" name="acesso" id="acesso" value="0"> Aluno
            @endif

        </p>

        <button type="submit"> confirmar edicao </button>
    </form>

    <br>
    <br>
    <br>
    <a href="{{ route('adm.listar') }}"> <button> <--- </button> </a>

    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title>Login</title>
</head>
<body>
        <form action="{{ route('aluno.cadastro.realizar') }}" method="post">
            @csrf
            <h1>Crie sua conta</h1>

            @if(session()->has('error'))
                <div class="alert alert-warning">
                    {{ session()->get('error') }}
                </div>
            @endif

            <input placeholder="Nome" type="text" name="nome" id="nome" required>
            <input placeholder="CPF" type="text" name="cpf" id="cpf" required maxlength="11">
            <input placeholder="Data de nascimento" type="date" name="nascimento" id="nascimento" required>
            <input placeholder="Celular" type="text" name="celular" id="celular" required maxlength="11">
            <input placeholder="E-mail" type="email" name="email" id="email" required>
            <input placeholder="Senha" type="password" name="password" id="password" required>
            <button type="submit">cadastrar</button>
        </form>

        <form action="{{ route('aluno.login.realizar') }}" method="post">
            @csrf
            <h1>Login</h1>
            <br><br>
            @if($errors->all())
                <div>
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </div>

            @endif

            <input placeholder="email@" type="email" name="email" id="email">
            <input placeholder="senha" type="password" name="password" id="password">
            <button type="submit">login</button>
        </form>
        <br>
        <br>
        <a href="{{ route('site.welcome') }}"> <button><---</button> </a>

        <script src="{{ asset('site/bootstrap.js') }}"></script>
        <script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>









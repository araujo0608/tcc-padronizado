<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title>Resgistro ADM</title>
</head>
<body>
<h1>Administrador</h1>
<h3> ops! o site nao possui um adm. Para prosseguir cadastre um </h3>

<form action="{{ route('adm.cadastro.realizar') }}" method="post">

    @csrf

    @if($errors->all())
        @foreach($errors->all() as $error)
            <p> {{ $error }} </p>
        @endforeach
    @endif

    Email: <input type="email" name="email" id="email" required>
    Senha:  <input type="password" name="password" id="password" required>

    <br>

    <button type="submit">Cadastrar</button>
</form>

<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar orcamento</title>
</head>
<body>
    <h1>Modo edicao de orcamento</h1>

    <form action="{{ route('adm.listar.edicao.orcamento.realizar') }}" method="post">
        @csrf
        @method('PUT')

        <input type="hidden" name="idusuario" value="{{ $dados->idusuario }}">

        <p>
            Preco: <input type="text" name="novopreco" id="novopreco" value="{{ $dados->preco }}">
        </p>

        <p>
            Data de vencimento: <input type="date" name="novovencimento" id="novovencimento" value="{{ $dados->vencimento }}">
        </p>

        <button type="submit">Efetuar edicao</button>
    </form>

    <br>
    <br>
    <a href="{{ route('adm.orcamento.listar') }}"><button>&slarr;</button></a>
</body>
</html>

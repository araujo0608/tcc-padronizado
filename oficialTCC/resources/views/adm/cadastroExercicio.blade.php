<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Exercicios</title>
</head>
<body>
    {{-- nome, area, aparelho, letra --}}

    <form action="{{ route('adm.cadastro.exercicio.realizar') }}" method="post">
        @csrf

        Nome:<input type="text" name="nome" id="nome" required>
        Area muscular: <input type="text" name="area" id="area" required>
        Aparelho: <input type="text" name="aparelho" id="aparelho" required>

        Letra:
        <select name="letra" id="letra" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select>

        <button type="submit">cadastrar</button>
    </form>

    <br>
    <br>
    <a href="{{ route('adm.principal') }}"><button><---</button></a>
</body>
</html>

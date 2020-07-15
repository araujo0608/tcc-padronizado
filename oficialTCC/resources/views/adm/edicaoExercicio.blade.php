<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edicao de exercicios</title>
</head>
<body>
    <h1>Modo edicao de exercicio</h1>
    <h5>insira os novos dados no formulario</h5>

    <form action="{{ route('adm.listar.edicao.exercicio.realizar') }}" method="post">
        @csrf
        @method('PUT')

        @if($errors->all())
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif

        <input type="hidden" name="exe" id="exe" value="{{ $exercicio->id }}">
        <p>
            Nome: <input type="text" name="nome" id="nome" value="{{ $exercicio->nome }}" required>
        </p>
        <p>
            Area muscular: <input type="text" name="area" id="area" value="{{ $exercicio->areamuscular }}" required>
        </p>
        <p>
            Aparelho: <input type="text" name="aparelho" id="aparelho" value="{{ $exercicio->aparelho }}" required>
        </p>
        <p>
            Letra:
            <select name="letra" id="letra" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </p>
            <button type="submit">editar</button>
    </form>

    <br>
    <br>
    <a href="{{ route('adm.listar.exercicios') }}"><button>voltar</button></a>
</body>
</html>

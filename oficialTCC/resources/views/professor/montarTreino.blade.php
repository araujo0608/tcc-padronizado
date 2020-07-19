<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title>Criacao do treino</title>
</head>
<body>
    <h2>Montar o treino do(a)  {{ $user->nome }}</h2>

    @if($errors->all())
        <div>
            @foreach($errors->all() as $error)
                <h5>{{$error}}</h5>
            @endforeach
        </div>
    @endif
    <br>
    <br>

    <table border="2">
        <tr>
            <th>Nome</th>
            <th>Marcar</th>
            <th>Serie</th>
            <th>Repeticao</th>
            <th>Intervalo (em segundos)</th>
            <th>Obs</th>
        </tr>

        <form action="{{ route('prof.homepage.montarTreino.realizar') }}" method="post">
            @csrf
            <input type="hidden" name='id' value={{ $user->id }}>
            @foreach($exercicios as $value)
                <tr>
                    <td>{{$value->nome}}</td>
                    <td><input type="checkbox" name="caixas[]" id="caixas[]" value="{{$value->id}}">
                        <input type="hidden" name="invisivel[]" id="invisivel[]" value="{{$value->id}}">
                    </td>
                    <td><input type="number" name="serie[]" id="serie[]" value="0"></td>
                    <td><input type="number" name="repeticao[]" id="repeticao[]" value="0"></td>
                    <td><input type="number" name="intervalo[]" id="intervalo[]" value="0"></td>
                    <td><input type="text" name="obs[]" id="obs[]" placeholder="observacoes" value="..."></td>
                </tr>
        @endforeach
    </table>

    <h5>
        Esse treino vai até: <input type="date" name="dataTroca" id="dataTroca" required>
    </h5>
    <p>
        Data de hoje: {{ date('d-m-Y') }}
    </p>

    <button type="submit">Salvar</button>
    </form>

    <br>
    <br>
    <a href="{{ route('professor.homepage.listarAlunos', session('nome')) }}"> <button><---</button> </a>

    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script>
        //Script que define um limite para a data da revisao
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("dataTroca").setAttribute("min", today);
    </script>
</body>
</html>

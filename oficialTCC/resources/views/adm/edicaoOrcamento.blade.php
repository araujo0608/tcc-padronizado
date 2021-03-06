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

        @if($errors->all())
                @foreach($errors->all() as $error)
                    <p> {{ $error }} </p>
                @endforeach
        @endif

        <input type="hidden" name="idusuario" value="{{ $dados->idusuario }}">
        <input type="hidden" name="velhovencimento" value="{{ $dados->vencimento}}">
        <input type="hidden" name="velhopreco" value="{{ $dados->preco }}">

        <p>
            Preco: <input type="number" name="novopreco" id="novopreco" step="any" min="0" value="{{ $dados->preco }}" required>
        </p>

        <p>
            Data de vencimento: <input type="date" name="novovencimento" id="datefield" required>
        </p>

        <button type="submit">Efetuar edicao</button>
    </form>

    <br>
    <br>
    <a href="{{ route('adm.orcamento.listar') }}"><button>&slarr;</button></a>

    {{--Script que define um limite para a data de vencimento--}}
    <script>
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
        document.getElementById("datefield").setAttribute("min", today);
    </script>
</body>
</html>

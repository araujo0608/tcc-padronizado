<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <title>Banco de usuarios</title>
</head>
<body>
    <h1>Usuarios cadastrados</h1>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>CARGO</th>
            <th>NASCIMENTO</th>
            <th>CPF</th>
            <th>CELULAR</th>
            <th><strong>EDICAO</strong></th>
            <th><strong>EXCLUIR</strong></th>
        </tr>
        @foreach($users as $value)
            @if($value->acesso != '2')
            <tr>
                <td> #{{ $value->id }} </td>
                <td> {{ $value->nome }} </td>
                <td> {{ $value->email }} </td>
                @if($value->acesso == '0')
                    <td> Aluno </td>
                @elseif($value->acesso == '1')
                    <td> Professor </td>
                @else
                    <td> Administrador </td>
                    @endif

                @if($value->nascimento == '')
                    <td>00-00-0000</td>
                @else
                     <td>{{date('d-m-Y', strtotime($value->nascimento))}}</td>
                @endif

                @if($value->cpf == '')
                    <td>000.000.000.00</td>
                @else
                    <td>{{$value->cpf}}</td>
                @endif

                @if($value->celular == '')
                    <td>(00)000000000</td>
                @else
                    <td>{{$value->celular}}</td>
                @endif

                <td>
                    <a href="{{ route('adm.listar.edicao', $value) }}"><button> editar </button></a>
                </td>

                <td>
                    <form action="{{ route('adm.listar.deletar') }}" method="post">
                        @method('delete')
                        @csrf

                        <input type="hidden" name="id" value="{{ $value->id }}">
                        <button type="submit"> deletar </button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </table>
    <br>
    <br>
    <a href="{{ route('adm.principal') }}"><button><---</button></a>

    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
</body>
</html>

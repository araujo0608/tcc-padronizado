<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> lista de orcamentos </title>
</head>
<body>
        <h1>Orcamentos</h1>

        <table border="2">
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Preco</th>
                <th>Data de vencimento</th>
                <th>Situacao</th>
                <th>Acao 01</th>
                <th>Acao 02</th>
                <th>Acao 03</th>
            </tr>

            @foreach($dados as $dado)
                <tr>
                    <td>{{$dado->id}}</td>
                    <td>{{$dado->nome}}</td>
                    <td>{{$dado->email}}</td>
                    <td>{{$dado->preco}}</td>
                    <td>{{ date('d-m-Y', strtotime($dado->vencimento))}}</td>
                    <td>{{$dado->situacao}}</td>

                    @if($dado->situacao == 'pendente')
                        <td><a href="#"><button>Efetuar pagamento</button></a></td>
                    @else
                        <td>################</td>
                    @endif

                    @if($dado->situacao == 'pendente')
                        <td>
                            <form action="{{ route('adm.orcamento.editar') }}" method="post">
                                @csrf
                                <input type="hidden" name="preco" value="{{ $dado->preco }}">
                                <input type="hidden" name="vencimento" value="{{ $dado->vencimento }}">
                                <input type="hidden" name="idusuario" value="{{ $dado->id }}">
                                <button type="submit">Editar</button>
                            </form>
                        </td>
                    @else
                        <td>######</td>
                    @endif


                    @if($dado->situacao == 'pendente')
                    <td><a href=""><button>excluir</button></a></td>
                    @else
                        <td>######</td>
                    @endif

                </tr>
            @endforeach
        </table>

        <br>
        <br>
        <a href="{{ route('adm.orcamento') }}"><button>&slarr;</button></a>
</body>
</html>

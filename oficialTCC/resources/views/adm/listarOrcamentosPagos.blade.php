<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagos</title>
</head>
<body>
    
    <h1> Orcamentos Pagos </h1>

    <table border="2">
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Preco</th>
            <th>Data do Pagamento</th>
            <th>Data de vencimento</th>
            <th>Situacao</th>
        </tr>

        @foreach($dados as $dado)
            <tr>
                <td>{{$dado->id}}</td>
                <td>{{$dado->nome}}</td>
                <td>{{$dado->email}}</td>
                <td>{{$dado->preco}}</td>
                <td>{{ date('d-m-Y',strtotime($dado->dataPagamento))}}</td>
                <td>{{ date('d-m-Y', strtotime($dado->vencimento))}}</td>
                <td>{{$dado->situacao}}</td>
            </tr>
        @endforeach
    </table>

    <br>
    <br>
    <a href="{{ route('adm.orcamento.listar') }}"><button>&slarr;</button></a>
</body>
</html>
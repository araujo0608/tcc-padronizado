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

    @if (count($dados) <= 0)
        <h2>Ops! Nao há registros</h2>
    @else

    @if($errors->all())
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
<table border="2">
    <tr>
        <th>#</th>
        <th>Usuario</th>
        <th>Email</th>
        <th>Preco</th>
        <th>Data do Pagamento</th>
        <th>Data de vencimento</th>
        <th>Situacao</th>
        <th>Excluir</th>
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
            <td>
                <form action="{{route('adm.orcamento.pagos.deletar')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="preco" value="{{$dado->preco}}">
                    <input type="hidden" name="vencimento" value="{{$dado->vencimento}}">
                    <input type="hidden" name="dataPagamento" value="{{$dado->dataPagamento}}">
                    <input type="hidden" name="idusuario" value="{{$dado->idusuario}}">
                    <button type="submit">excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

    @endif

    <br>
    <br>
    <a href="{{ route('adm.orcamento.listar') }}"><button>&slarr;</button></a>
</body>
</html>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Pra qual usuario?</title>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="modalEscolhaUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Orcamento pra qual usuario ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('adm.orcamento.cadastro.realizar') }}" method="post">
                @csrf

                @if($errors->all())
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                @endif

                <div class="modal-body">

                    <p>
                        Preco: {{ $dados->preco }}
                    </p>
                    <p>
                        Data de vencimento: {{ date('d-m-Y', strtotime($dados->vencimento)) }}
                    </p>

                        <select name="idusuario" id="idusuario" required>
                            @foreach($usuarios as $usuario)
                                <option value="{{$usuario->id}}">{{ $usuario->nome }} | {{ $usuario->email }}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="preco" value="{{ $dados->preco }}">
                        <input type="hidden" name="vencimento" value="{{ $dados->vencimento }}">


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Finalizar</button>
                    <a href="{{ route('adm.orcamento.cadastro') }}"><button type="button" class="btn btn-secondary">Sair</button></a>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
{{-- Script que faz o popup aparecer quando a pagina carregar--}}
<script>
    $(document).ready(function () {
        $('#modalEscolhaUsuario').modal('show');
    })
</script>
</body>
</html>

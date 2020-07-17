<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> Orcamentos </title>
</head>
<body>
        <h2>Novo Orcamento</h2>

        

        <form action="{{ route('adm.orcamento.cadastro.usuario') }}" method="post">
            @csrf
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <p> {{ $error }} </p>
                @endforeach
            @endif
            <p>
                Data de vencimento:
                <input type="date" name="vencimento" id="vencimento" required>
            </p>
            <p>
                Preco:
                <input type="number" name="preco" id="preco" step="any" min="0" required>
            </p>

            <button type="submit">usuario</button>
        </form>

        <br>
        <br>
        <a href="{{ route('adm.orcamento') }}"><button>voltar</button></a>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        {{--Script que define o limite de hoje para a data de vencimento--}}
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
            document.getElementById("vencimento").setAttribute("min", today);
        </script>
</body>
</html>

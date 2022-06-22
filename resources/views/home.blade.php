<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</head>

<body class= "bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>Lista de Tarefas</h3>
                <form action="{{ route('store') }}" method = "POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="conteudo" class="form-control" placeholder="Adicione sua nova Tarefa:">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                @if (count($todolist))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($todolist as $todolist)
                    <li class="list-group-item">
                        <form action="{{route('destroy', $todolist->id, 'update') }}" method="POST">
                            {{$todolist->conteudo}}
                        @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>
                    @endforeach
                    </li>
                </ul>
                @else
                <p class="text-center mt-3">Sem Tarefas!</p>
                @endif
            </div>
        </div>
    </div>

</body>

</html>
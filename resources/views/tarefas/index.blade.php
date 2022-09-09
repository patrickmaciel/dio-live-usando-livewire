<h1>Tarefas</h1>

<form action="{{ route('tarefas.index') }}" method="GET">
    <input type="text" name="busca" placeholder="Buscar tarefa" />
</form>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Categoria</th>
            <th>Nome</th>
            <th>Concluida</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($tarefas as $tarefa)
            <tr>
                <td>{{ $tarefa->id }}</td>
                <td>{{ $tarefa->categoria }}</td>
                <td>{{ $tarefa->titulo }}</td>
                <td>{{ $tarefa->concluida }}</td>
                <td>
                    <a href="#">Editar</a>
                    <a href="#">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

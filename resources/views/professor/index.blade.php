<div>
<form action="{{ route('professor.add') }}" method="post">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
        <br> <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <br> <br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone">

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>

    
    <table border="1">
        <tr>
            <td>Nome do Professor</td>
            <td>email</td>
            <td>telefone</td>
            <td colspan="2">Ações</td>
        </tr>
        @isset($professores)
                @foreach($professores as $professor)
                    <tr>
                        <td>
                            <h3>{{ $professor->nome }}</h3>
                        </td>
                        <td>
                            <h3>{{ $professor->email }}</h3>
                        </td>
                        <td>
                            <h3>{{ $professor->telefone }}</h3>
                        </td>
                        <td>
                        <form action="{{ route('professor.remove', ['id' => $professor->id]) }}" method="GET">
                                <button type="submit">Remover</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('professor.atualizar', ['id' => $professor->id]) }}" method="GET">
                                <button type="submit">Atualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        @endisset
    </table>
</div>

<div>
<form action="{{ route('componente.add') }}" method="post">
        @csrf
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            
            <label for="hora_inicio">Hora de Início</label>
            <input type="time" name="hora_inicio" id="hora_inicio">
            
            <label for="hora_fim">Hora de Fim</label>
            <input type="time" name="hora_fim" id="hora_fim">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
    <table border="1">
        <tr>
            <td>Nome do Componente</td>
            <td>hora de inicio</td>
            <td>hora de fim</td>
            <td colspan="2">Ações</td>
        </tr>
        @isset($componentes)
                @foreach($componentes as $componente)
                    <tr>
                        <td>
                            <h3>{{ $componente->nome }}</h3>
                        </td>
                        <td>
                            <h3>{{ $componente->hora_inicio }}</h3>
                        </td>
                        <td>
                            <h3>{{ $componente->hora_fim }}</h3>
                        </td>
                        <td>
                        <form action="{{ route('componente.remove', ['id' => $componente->id]) }}" method="GET">
                                <button type="submit">Remover</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('componente.atualizar', ['id' => $componente->id]) }}" method="GET">
                                <button type="submit">Atualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        @endisset
    </table>
</div>

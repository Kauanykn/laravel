<div>
    <form action="{{ route('componente.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $componente->id }}">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $componente->nome }}">

        <label for="hora_inicio">Hora de Inicio</label>
        <input type="time" name="hora_inicio" id="hora_inicio" value="{{ $componente->hora_inicio }}">

        <label for="hora_fim">Hora de Fim</label>
        <input type="time" name="hora_fim" id="hora_fim" value="{{ $componente->hora_fim }}">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
</div>


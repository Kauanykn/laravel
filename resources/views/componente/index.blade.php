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
    </form></div>

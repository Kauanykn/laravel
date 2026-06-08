<div>
<form action="{{ route('curso.add') }}" method="post">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">

        <label for="periodo">Periodo</label>
        <input type="text" name="periodo" id="periodo">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
    @isset($cursos)
    <table border="1" style="width:40%; border-collapse: collapse; text-align: left;">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th style="padding: 8px;">Nome do Curso</th>
                <th style="padding: 8px;">Período</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td style="padding: 8px;">{{ $curso->nome }}</td>
                    <td style="padding: 8px;">{{ $curso->periodo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endisset
    
     <!-- @isset($cursos)
            @foreach($cursos as $curso)
                <h3>{{ $curso->nome }}</h3>
                <h4>{{ $curso->periodo }}</h4>
            @endforeach
    @endisset -->
</div>

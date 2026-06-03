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
    </form>
</div>

<div>
    <form action="{{ route('administrador.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $administrador->id }}">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $administrador->nome }}">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ $administrador->email }}">

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="{{ $administrador->telefone }}">

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" value="{{ $administrador->cpf }}">

        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" value="{{ $administrador->usuario }}">

        <label for="senha">Senha</label>
        <input type="text" name="senha" id="senha" value="{{ $administrador->senha }}">

        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="{{ $administrador->status }}">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
</div>

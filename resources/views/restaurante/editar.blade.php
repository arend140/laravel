<h1>Editar cliente</h1>
<form action="{{ route('clientes.editarGravar') }}" method="post">

    @method('PUT')
    @csrf

    <input type="hidden" name="id" value="{{ $cliente->id }}">

    <input type="text" name="nome" placeholder="Nome" value="{{ $cliente->nome }}">
    <br>
    <input type="text" name="endereco" placeholder="Endereço" value="{{ $cliente->endereco }}">
    <br>
    <input type="text" name="telefone" placeholder="Telefone" value="{{ $cliente->telefone }}">
    <br>
    <input type="date" name="data_nasc" value="{{ $cliente->data_nasc }}">
    <br>

    <input type="submit" value="Salvar Cliente">
</form>
<h1>Listagem de clientes</h1>
<p>Seja bem-vindo a listagem de clientes</p>
<hr>
<form action="{{ route('clientes.gravar') }}" method="post">
    @csrf

    <input type="text" name="nome" placeholder="Nome">
    <br>
    <input type="text" name="endereco" placeholder="Endereço">
    <br>
    <input type="text" name="telefone" placeholder="Telefone">
    <br>
    <input type="date" name="data_nasc">
    <br>

    <input type="submit" value="Inserir Cliente">
</form>

@foreach ($clientes as $cliente)
    <div style="border:1px dashed">
        <ul>
            <li>Nome: {{ $cliente->nome }}</li>
            <li>Endereço: {{ $cliente->endereco }}</li>
            <li>Telefone: {{ $cliente->telefone }}</li>
            <li>Data de nascimento: {{ $cliente->data_nasc }}</li>
        </ul>
        <a href="{{ route('clientes.editar', $cliente->id) }}">Editar</a>
    </div>
@endforeach
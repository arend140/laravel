<h1>Keepinho</h1>
<p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o Google).</p>
<hr>
<form action="{{ route('keep.gravar') }}" method="post">
    @csrf
    <textarea name="texto" id="" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" value="Gravar nota">
</form>


@foreach ($notas as $nota)
    <div style="border:1px dashed">
        {{ $nota->texto }}
        <br>
        <a href="{{ route('keep.editar', $nota->id) }}">Editar</a>
    </div>
@endforeach
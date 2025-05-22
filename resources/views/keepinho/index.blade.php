<h1>Keepinho</h1>
<p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o Google).</p>
<hr>

<a href="{{  route('keep.lixeira') }}">🗑️Lixeira</a>

<hr>
@if ($errors->any())
    <div style="color: red;">
        <h3>Erro!</h3>

        <ul>
            @foreach($errors->all() as $err)
            <li>{{  $err }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('keep.gravar') }}" method="post">
    @csrf
    <input type="text" name="titulo" placeholder="Título" value="{{ old('titulo') }}">
    <br>
    <textarea name="texto" id="" cols="30" rows="10">{{ old('texto') }}</textarea>
    <br>
    <input type="submit" value="Gravar nota">
</form>


@foreach ($notas as $nota)
    <div style="border:1px dashed">
        <h4>{{ $nota->titulo }}</h4>
        {{ $nota->texto }}
        <br>
        <a href="{{ route('keep.editar', $nota->id) }}">Editar</a>
        <br>
        <form action="{{  route('keep.apagar', $nota->id) }}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Apagar">
        </form>
    </div>
@endforeach
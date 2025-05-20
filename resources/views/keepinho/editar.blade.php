<h1>Keepinho</h1>
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
<form action="{{ route('keep.editarGravar') }}" method="post">
    <!-- Altera para método PUT -->
    @method('PUT')
    @csrf

    <input type="hidden" name="id" value="{{ $nota->id }}">
    <input type="text" name="titulo" value="{{ old('titulo', $nota->titulo) }}">
    <br>
    <textarea name="texto" id="" cols="30" rows="10"> {{ old('texto', $nota->texto) }}</textarea>
    <br>
    <input type="submit" value="Gravar nota">
</form>

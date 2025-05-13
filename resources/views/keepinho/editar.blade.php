<h1>Keepinho</h1>
<form action="{{ route('keep.editarGravar') }}" method="post">
    <!-- Altera para método PUT -->
    @method('PUT')
    @csrf

    <input type="hidden" name="id" value="{{ $nota->id }}">
    <input type="text" name="titulo" value="{{ $nota->titulo }}">
    <br>
    <textarea name="texto" id="" cols="30" rows="10"> {{ $nota->texto }}</textarea>
    <br>
    <input type="submit" value="Gravar nota">
</form>

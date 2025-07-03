<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        
        return view('produtos.index', [
            'produtos' => $produtos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', ['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']);
        $produto = null;

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('produtos', 'public');

            $produto = Produto::create([
                'nome'=> $request->nome,
                'preco'=> $request->preco,
                'descricao'=> $request->descricao,
                'imagem'=> $caminhoImagem,
            ]);
        }else{
            $produto = Produto::create($request->all());
        }

        $produto->categoria()->attach([$request->categoria]);
        //['produto_id'=>Produto::get()->last()->id, 'categoria_id'=>$request->categoria]

        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
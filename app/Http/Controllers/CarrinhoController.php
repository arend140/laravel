<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index(){
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    public function store(Produto $produto){
        session()->push('carrinho', $produto);//attributesToArray()
        return redirect()->route('carrinho');
    }

    public function delete(string $id){
        session()->forget("carrinho.$id");
        return redirect()->route('carrinho');
    }
}

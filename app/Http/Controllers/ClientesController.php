<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(){
        $clientes = Cliente::all();

        return view('restaurante/index', [
            'clientes' => $clientes,
        ]);
    }

    public function gravar(Request $request){
        Cliente::create($request->all());
        return redirect()->route('clientes');
    }

    public function editar(Cliente $cliente, Request $request){
        
        if ($request->isMethod('put')){
            $cliente = Cliente::find($request->id);
            $cliente->nome = $request->nome;
            $cliente->endereco = $request->endereco;
            $cliente->telefone = $request->telefone;
            $cliente->data_nasc = $request->data_nasc;

            $cliente->save();

            return redirect()->route('clientes');
        }

        return view('restaurante.editar', ['cliente' => $cliente]);
    }
}

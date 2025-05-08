<?php

use App\Http\Controllers\CalculosController;
use App\Http\Controllers\KeepinhoController;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    //echo "oi";
});

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/teste/{valor}', function ($valor) {
    return "Você digitou: {$valor}";
});

Route::get('/soma/{valor1}/{valor2}', function ($valor1, $valor2){
    $soma = $valor1 + $valor2;
    return 'A soma dos números digitados é:' . $soma;
});

//Cálculos
Route::get('/calc/somar/{x}/{y}', [CalculosController::class, 'somar']);
Route::get('/calc/subtrair/{x}/{y}', [CalculosController::class, 'subtrair']);

//Criar a rota e a função na controller para o "quadrado" -> Elevar um único número ao quadrado
Route::get('/calc/quadrado/{x}', [CalculosController::class, 'quadrado']);

//Keepinho
Route::prefix('/keep')->group(function () {
    Route::get('/', [KeepinhoController::class,'index'])->name('keep');

    Route::post('/gravar', [KeepinhoController::class,'gravar'])->name('keep.gravar');

    Route::get('/editar/{nota}', [KeepinhoController::class, 'editar'])->name('keep.editar'); //Formulário

    Route::put('/editar', [KeepinhoController::class, 'editar'])->name('keep.editarGravar'); //Ação

    Route::delete('/apagar/{nota}', [KeepinhoController::class, 'apagar'])->name('keep.apagar');

});

Route::prefix('/clientes')->group(function () {
    Route::get('/', [ClientesController::class,'index'])->name('clientes');

    Route::post('/gravar', [ClientesController::class,'gravar'])->name('clientes.gravar');

    Route::get('/editar/{cliente}', [ClientesController::class,'editar'])->name('clientes.editar');

    Route::put('/editar', [ClientesController::class,'editar'])->name('clientes.editarGravar');


});
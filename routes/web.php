<?php

use App\Http\Controllers\CalculosController;
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
Route::get('/calc/somar/{x}/{y}', [CalculosController::class, 'soma']);
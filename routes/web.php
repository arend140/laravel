<?php

use App\Http\Controllers\CalculosController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeepinhoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

    Route::get('/lixeira', [KeepinhoController::class, 'lixeira'])->name('keep.lixeira');

    Route::get('/restaurar/{nota}', [KeepinhoController::class, 'restaurar'])->name('keep.restaurar');

});

Route::prefix('/clientes')->group(function () {
    Route::get('/', [ClientesController::class,'index'])->name('clientes');

    Route::post('/gravar', [ClientesController::class,'gravar'])->name('clientes.gravar');

    Route::get('/editar/{cliente}', [ClientesController::class,'editar'])->name('clientes.editar');

    Route::put('/editar', [ClientesController::class,'editar'])->name('clientes.editarGravar');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('produtos', ProdutosController::class);

Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho');
Route::get('/carrinho/adicionar/{produto}', [CarrinhoController::class, 'store'])->name('carrinho.adicionar');
Route::get('/carrinho/apagar/{produto}', [CarrinhoController::class, 'delete'])->name('carrinho.apagar');

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categorias/store', [CategoriaController::class, 'store'])->name('categoria.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('post.edit');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/posts/{category_id}', [CategoryController::class, 'posts'])->name('category.posts');

require __DIR__.'/auth.php';

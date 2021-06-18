<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\TamanhoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/**ROTAS ENDEREÇO*/
	Route::get('/endereco/lista', [EnderecoController::class,'lista'])->name('endereco_lista');
    Route::get('/endereco/cadastro/{id?}',[EnderecoController::class,'cadastro'])->name('endereco_cadastro');
    Route::post('/endereco/salvar/{id?}', [EnderecoController::class,'salvar'])->name('endereco_salvar');
    Route::get('/endereco/excluir/{id}', [EnderecoController::class,'excluir'])->name('endereco_excluir');

/**ROTAS CIDADE*/
	Route::get('/cidade/lista', [CidadeController::class,'lista'])->name('cidade_lista');
    Route::get('/cidade/cadastro/{id?}', [CidadeController::class,'cadastro'])->name('cidade_cadastro');
    Route::post('/cidade/salvar/{id?}', [CidadeController::class,'salvar'])->name('cidade_salvar');
    Route::get('/cidade/excluir/{id}', [CidadeController::class,'excluir'])->name('cidade_excluir');

/**ROTAS TAMANHO*/
    Route::get('/tamanho/lista', [TamanhoController::class,'lista'])->name('tamanho_lista');
    Route::get('/tamanho/cadastro/{id?}', [TamanhoController::class,'cadastro'])->name('tamanho_cadastro');
    Route::post('/tamanho/salvar/{id?}', [TamanhoController::class,'salvar'])->name('tamanho_salvar');
    Route::get('/tamanho/excluir/{id}', [TamanhoController::class,'excluir'])->name('tamanho_excluir');

/**ROTAS CATEGORIA*/
    Route::get('/categoria/lista', [CategoriaController::class,'lista'])->name('categoria_lista');
    Route::get('/categoria/cadastro/{id?}', [CategoriaController::class,'cadastro'])->name('categoria_cadastro');
    Route::post('/categoria/salvar/{id?}', [CategoriaController::class,'salvar'])->name('categoria_salvar');
    Route::get('/categoria/excluir/{id}', [CategoriaController::class,'excluir'])->name('categoria_excluir');

/**ROTAS PRODUTO*/
    Route::get('/produto/lista', [ProdutoController::class,'lista'])->name('produto_lista');
    Route::get('/produto/cadastro/{id?}', [ProdutoController::class,'cadastro'])->name('produto_cadastro');
    Route::post('/produto/salvar/{id?}', [ProdutoController::class,'salvar'])->name('produto_salvar');
    Route::get('/produto/excluir/{id}', [ProdutoController::class,'excluir'])->name('produto_excluir');
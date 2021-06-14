<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\CidadeController;


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
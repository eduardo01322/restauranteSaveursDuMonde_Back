<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteRestauranteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoRestauranteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Produtos
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

//Cliente
Route::get('/clientes', [ClienteController::class, 'cliente']);
Route::post('/clientes', [ClienteController::class, 'image']);

//Produtos Restaurante
Route::get('/produtos/restaurante', [ProdutoRestauranteController::class, 'produto']);
Route::post('/produtos/restaurante', [ProdutoRestauranteController::class, 'store']);

//Cliente
Route::get('/clientes/restaurante', [ClienteRestauranteController::class, 'clienteRestaurante']);
Route::post('/clientes/restaurante', [ClienteRestauranteController::class, 'image']);
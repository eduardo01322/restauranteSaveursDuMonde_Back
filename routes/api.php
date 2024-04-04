<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

//Cliente
Route::get('/clientes', [ProdutoController::class, 'cliente']);
Route::post('/clientes', [ProdutoController::class, 'image']);

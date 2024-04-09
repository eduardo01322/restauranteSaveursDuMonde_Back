<?php

namespace App\Http\Controllers;

use App\Models\ProdutoRestaurante;
use Illuminate\Http\Request;

class ProdutoRestauranteController extends Controller
{
    public function Produto(){
        $produtos = ProdutoRestaurante::all();

        $produtosComImagem = $produtos->map(function($produto){
            return [
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'ingredientes' => $produto->ingredientes,
                'imagem' => asset('storage/' . $produto->imagem),
            ];
        });
        return response()->json($produtosComImagem);
    }
    public function store(Request $request)
    {
        $produtoData = $request->all();
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagens/produtos', $nomeImagem, 'public');
            $produtoData['imagem'] = $caminhoImagem;
        }
        $produto = ProdutoRestaurante::create($produtoData);
        return response()->json(['produto' => $produto], 201);
    }
}

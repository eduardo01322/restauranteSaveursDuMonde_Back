<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function cliente(ClienteFormRequest $request){
        $cliente = Cliente::all();

        $clienteComImagem = $cliente->map(function($cliente){
            return [
                'nome' => $cliente->nome,
                'telefone' => $cliente->telefone,
                'endereco' => $cliente->endereco,
                'email' => $cliente->email,
                'password'=> Hash::make($cliente->password),
                'imagem' => asset('storage/' . $cliente->imagem),
            ];
        });
        return response()->json($clienteComImagem);
    }
    public function image(Request $request)
    {
        $clienteData = $request->all();
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagens/cliente', $nomeImagem, 'public');
            $clienteData['imagem'] = $caminhoImagem;
        }
        $cliente = cliente::create($clienteData);
        return response()->json(['cliente' => $cliente], 201);
    }
}

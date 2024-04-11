<?php

namespace App\Http\Controllers;


use App\Http\Requests\ClienteRestauranteFormRequest;
use App\Models\ClienteRestaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteRestauranteController extends Controller
{
    public function clienteRestaurante(){
        $clientesR = ClienteRestaurante::all();

        $clienteCadastro = $clientesR->map(function($cliente){
            return [
                'nome' => $cliente->nome,
                'telefone' => $cliente->telefone,
                'endereco' => $cliente->endereco,
                'email' => $cliente->email,
                'cpf' => $cliente->cpf,
                'password'=> Hash::make($cliente->password),
                'foto' => asset('storage/' . $cliente->foto),
                
            ];
        });
        return response()->json($clienteCadastro);
    }
    public function image(ClienteRestauranteFormRequest $request)
    {
        $clienteData = $request->all();
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagens/clientes', $nomeImagem, 'public');
            $clienteData['imagem'] = $caminhoImagem;
        }
        $cliente = clienteRestaurante::create($clienteData);
        return response()->json(['cliente' => $cliente], 201);
    }
}

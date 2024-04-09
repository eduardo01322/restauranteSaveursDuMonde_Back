<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRestauranteFormRequest;
use App\Models\ClienteRestaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteRestauranteController extends Controller
{
    public function clienteRestaurante(ClienteRestauranteFormRequest $request){
        $clientesR = ClienteRestaurante::all();

        $clienteCadastro = $clientesR->map(function($cliente){
            return [
                'nome' => $cliente->nome,
                'telefone' => $cliente->telefone,
                'endereco' => $cliente->endereco,
                'email' => $cliente->email,
                'cpf' => $cliente->cpf,
                'password'=> Hash::make($cliente->password),
                
            ];
        });
        return response()->json($clienteCadastro);
    }
}

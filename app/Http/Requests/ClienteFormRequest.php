<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|',
            'telefone' => 'required|max:15|min:10|unique:clientes,telefone',
            'endereco' => 'required',
            'email' => 'required|email|unique:clientes,email',
            'password' => 'required',
            'foto' => '',
        ];
    }

public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){

        return[
            'nome.required' => 'o nome é obrigatorio',
            'nome.max' => 'o campo nome deve contar no maximo 80 caracteres',
            'telefone.required' => 'o telefone é obrigatorio',
            'telefone.max' => 'o campo telefone deve contar no maximo 15 caracteres',
            'telefone.min' => 'o campo telefone deve contar no minimo 10 caracteres',
            'telefone.unique' => 'telefone já cadastrado no sistema',
            'endereco.required' => 'o endereço é obrigatorio',
            'email.required' => 'o email é obrigatorio',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'email ja cadastrado no sistema',
            'password.required' => 'a senha obrigatorio',
        ];
    }
}
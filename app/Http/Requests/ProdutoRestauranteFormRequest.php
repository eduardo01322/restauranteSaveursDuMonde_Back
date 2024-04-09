<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutoRestauranteFormRequest extends FormRequest
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
            'nome' => 'required',
            'preco' => 'required',
            'ingredientes' => 'required',
            'imagem' => 'required',
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
            'preco.required' => 'o preco é obrigatorio',
            'ingredientes.required' => 'o ingredientes é obrigatorio',
            'imagem.required' => 'o imagem é obrigatorio',
        ];
    }
}

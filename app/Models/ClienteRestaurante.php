<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteRestaurante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'endereco',
        'email',
        'cpf',
        'password',
        'foto'
    ];
}

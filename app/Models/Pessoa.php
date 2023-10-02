<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    public $timestamps = false;
    protected  $primaryKey = 'cpf';
    use HasFactory;

    protected $fillable = ["cpf","primeiro_nome","sobrenome", "telefone", "email", "data_nascimento"];
}

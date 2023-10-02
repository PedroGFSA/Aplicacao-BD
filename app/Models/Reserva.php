<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public $timestamps = false;
    protected  $primaryKey = 'id';
    use HasFactory;

    protected $fillable = ["id", "livro_id","mat_aluno", "mat_funcionario"];

    public function livros() {
      return $this->belongsToMany('App\models\Livro');
    }
}

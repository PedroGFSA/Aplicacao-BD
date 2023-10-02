<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
  public $timestamps = false;
  protected  $primaryKey = 'id';
  use HasFactory;

  protected $fillable = ["id","titulo","autor", "categoria", "cod_secao", "data_publicacao"];

  public function reservas() {
    return $this->belongsToMany('App\models\Reserva');
  }


}

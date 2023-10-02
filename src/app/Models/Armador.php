<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armador extends Model
{
  public $timestamps = false;
  use HasFactory;
  protected $table = "armador";
  protected $primaryKey = 'id';
  protected $fillable = [
    'id',
    'nombre',
    'estado','id_usuario_c','id_usuario_m'
  ];



  public function usuarios()
  {
      return $this->hasMany(User::class, 'armador', 'id');
  }
}




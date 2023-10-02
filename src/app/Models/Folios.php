<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folios extends Model
{
  public $timestamps = false;
  use HasFactory;
  protected $table = "folios";
  protected $primaryKey = 'id';
  protected $fillable = [
    'id_embarcacion',
    'id_bitacora',
    'folio',
    'estado',
    'id_usuario_c',
    'id_usuario_m',
    'armador'

  ];


    
}

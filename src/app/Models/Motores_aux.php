<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motores_aux extends Model
{
  use HasFactory;
  
  protected $table = 'motores_aux';
  protected $primaryKey = 'id';

  protected $fillable = [
    'id',
    'id_bitacora',
    'aceite_m_aux_bb',
    'aceite_m_aux_eb',
    'filtro_ac_m_aux_bb',
    'filtro_ac_m_aux_eb',
    'filtro_pet_m_aux_bb',
    'filtro_pet_m_aux_eb',
    'id_usuario_c',
    'id_usuario_m',
    'estado'

  ];
  
}

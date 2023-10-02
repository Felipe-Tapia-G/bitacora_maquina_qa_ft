<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla_de_cambios extends Model
{
  use HasFactory;
  
  protected $table = 'tabla_de_cambios';
  protected $primaryKey = 'id';

  protected $fillable = [
    'id',
    'id_bitacora',
    'horometro_mp_aceite',
    'horometro_mp_filtro_combustible',
    'horometro_mp_filtro_aceite',
    'horometro_mp_filtro_racor',
    'horometro_cm_aceite',
    'horometro_cm_filtro_aceite',
    'horometro_hy_aceite',
    'horometro_hy_filtro_aceite',
    'fecha_mp_aceite',
    'fecha_mp_filtro_combustible',
    'fecha_mp_filtro_aceite',
    'fecha_mp_filtro_racor',
    'fecha_cm_aceite',
    'fecha_hy_aceite',
    'fecha_hy_filtro_aceite',
    'duracion_mp_aceite',
    'duracion_mp_filtro_combustible',
    'duracion_mp_filtro_aceite',
    'duracion_mp_filtro_racor',
    'duracion_cm_aceite',
    'duracion_hy_aceite',
    'duracion_hy_filtro_aceite',
    'armador',
    'id_usuario_c',
    'id_usuario_m'
  


  ];
  
}

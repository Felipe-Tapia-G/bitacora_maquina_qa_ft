<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablacambio_motoresaux extends Model
{
  use HasFactory;
  
  protected $table = 'tablacambio_motoresaux';
  protected $primaryKey = 'id';

  protected $fillable = [

    'id_bitacora',
    'numero_motor_aux',
    'horometro_Aceite',
    'horometro_filtro_aceite',
    'horometro_fitro_combustible',
    'horometro_filtro_racor',
    'horometro_filtro_aire',
    'fecha_aceite',
    'fecha_filtro_aceite',
    'fecha_fitro_conbustible',
    'fecha_filtro_racor',
    'fecha_filtro_aire',
    'duracion_aceite',
    'duracion_filtro_aceite',
    'duracion_filtro_combustible',
    'duracion_filtro_racor',
    'duracion_filtro_aire',
    'id_usuario_c',
    'id_usuario_m'

    



  ];
  
}

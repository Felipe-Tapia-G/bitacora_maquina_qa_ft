<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motores_auxiliares extends Model
{
  use HasFactory;
  
  protected $table = 'motores_auxiliares';
  protected $primaryKey = 'id';

  protected $fillable = [
 
    'id_bitacora',
    'numero_motor_aux',
    'horas_zarpe',
    'horas_recalada',
    'horas_aceite',
    'hora_filtro_aceite',
    'hora_filtro_combustible',
    'hora_filtro_racor',
    'hora_filtro_aire',
    'duracion_aceite',
    'duracion_filtro_aceite',
    'duracion_filtro_combustible',
    'duracion_filtro_racor',
    'duracion_filtro_aire',
    'id_usuario_c',
    'id_usuario_m',
    'estado'
    



  ];
  
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor_principal_y_cm extends Model
{
  use HasFactory;
  
  protected $table = 'motor_principal_y_cm';
  protected $primaryKey = 'id';

  protected $fillable = [
                          'id',
                          'id_bitacora',
                          'horas_aceite_mp',
                          'hora_filtro_ac_mp',
                          'hora_filtro_petr_mp',
                          'hora_filtro_racor',
                          'horas_aceite_cm',
                          'hora_filtro_ac_cm',
                          'horas_filtro_de_aire_mp',
                          'horasmotor_principal',
                          'horas_contra_marcha',
                          'hora_de_hytek',
                          'hora_aceite_hytek',
                          'hora_filtro_hytek',
                          'id_usuario_c',
                          'id_usuario_m',
                          'estado'

                        ];
  
}

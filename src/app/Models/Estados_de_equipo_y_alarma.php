<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados_de_equipo_y_alarma extends Model
{
  use HasFactory;
  
  protected $table = 'estados_de_equipo_y_alarma';
  protected $primaryKey = 'id';

  protected $fillable = [
    'id',
    'id_bitacora',
    'alternador_mp',
    'bba_pescado',
    'alternador_ma',
    'winche',
    'winche',
    'luces',
    'anet_winch',
    'baterias',
    'net_stacker',
    'gobierno',
    'racel',
    'propulsion',
    'sentina',
    'bra_archique',
    'p_mp',
    'estanque',
    't_mp',
    'id_usuario_c',
    'id_usuario_m',
    'estado'
 
  ];
  
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contra_marcha extends Model
{
  use HasFactory;
  
  protected $table = 'contra_marcha';
  protected $primaryKey = 'id';

  protected $fillable = [
                      'id',
                      'id_bitacora',
                      'naceite_0004',
                      'paceite_0004',
                      'aceite_0004',
                      'naceite_0408',
                      'paceite_0408',
                      'aceite_0408',
                      'naceite_0812',
                      'paceite_0812',
                      'aceite_0812',
                      'aceite_0812',
                      'aceite_0812',
                      'aceite_0812',
                      'aceite_0812',
                      'aceite_0812',
                      'aceite_0812',
                      'aceite_0812',
                      'paceite_2024',
                      'id_usuario_c',
                      'id_usuario_m',
                      'id_usuario_m'

                    ];

  
}

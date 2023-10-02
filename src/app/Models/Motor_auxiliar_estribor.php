<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor_auxiliar_estribor extends Model
{
  use HasFactory;
  
  protected $table = 'motor_auxiliar_estribor';
  protected $primaryKey = 'id';

  protected $fillable = [


    'id_bitacora', 
    'naceite_0004', 
    'haceite_0004', 
    'volt_0004', 
    'amp_0004', 
    'ciclos_0004', 
    'naceite_0408', 
    'haceite_0408', 
    'volt_0408', 
    'amp_0408', 
    'ciclos_0408', 
      'naceite_0812', 
    'haceite_0812', 
    'volt_0812', 
    'amp_0812', 
    'ciclos_0812', 
      'naceite_1216', 
    'haceite_1216', 
    'volt_1216', 
    'amp_1216', 
    'ciclos_1216', 
    'naceite_1620', 
    'haceite_1620', 
    'volt_1620', 
    'amp_1620', 
    'ciclos_1620', 
      'naceite_2024', 
    'haceite_2024', 
    'volt_2024', 
    'amp_2024', 
    'ciclos_2024', 
    'id_usuario_c', 
    'id_usuario_m', 
    'estado' 


  ];
  
}

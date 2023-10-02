<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor_principal extends Model
{
  use HasFactory;
  
  protected $table = 'motor_principal';
  protected $primaryKey = 'id';

  protected $fillable = [
    'id',
    'rpm_0004',
    'naceite_0004',
    'relleno_0004',
    'paceite_0004',
    'escbb_0004',
    'admeb_0004',
    'escet_0004',
    'admes_0004',
    'id_bitacora'
  ];

  
}

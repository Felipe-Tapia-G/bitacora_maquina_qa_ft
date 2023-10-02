<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Embarcacion extends Model
{
  public $timestamps = false;
  use HasFactory;
  protected $table = "embarcacion";
  protected $primaryKey = 'id';
  protected $fillable = [
    'id',
    'nombre',
    'matricula',
    'rpi',
    'armador',
    'arte_pesca',
    'armador',
    'cantidad_motores_aux'
    

  ];


    
}

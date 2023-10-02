<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados_equipos_y_alarmas extends Model
{
  public $timestamps = false;
  use HasFactory;
  protected $table = "estados_equipos_y_alarmas";
  protected $primaryKey = 'id';
  protected $fillable = [
 
    'nombre'
  ];


    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveles_de_aceite extends Model
{
  public $timestamps = false;
  use HasFactory;
  protected $table = "niveles_de_aceite";
  protected $primaryKey = 'id';
  protected $fillable = [

    'nombre'
 
  ];


    
}

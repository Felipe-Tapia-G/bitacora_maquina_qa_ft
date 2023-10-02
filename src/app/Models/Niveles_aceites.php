<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveles_aceites extends Model
{
  public $timestamps = false;
  use HasFactory;
  protected $table = "niveles_aceites";
  protected $primaryKey = 'id';
  protected $fillable = [

    'nombre'

  ];


    
}

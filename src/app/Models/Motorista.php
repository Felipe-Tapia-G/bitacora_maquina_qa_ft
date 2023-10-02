<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
  use HasFactory;
  protected $table = 'motorista';
  protected $primaryKey = 'rut';
  protected $keyType = "String";
  protected $casts = [
    'rut' => 'string'
  ];
  protected $fillable = [
    'rut','nombres','armador'
  ];
}

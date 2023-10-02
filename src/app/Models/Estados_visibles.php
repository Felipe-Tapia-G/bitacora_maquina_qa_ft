<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados_visibles extends Model
{
  use HasFactory;
  protected $table = "estados_visibles";
  protected $fillable = [
    'nombre'
  ];
  
}

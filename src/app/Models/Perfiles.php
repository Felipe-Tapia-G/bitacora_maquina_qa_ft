<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
  public $timestamps = false;
  use HasFactory;
  protected $table = "perfiles";
  protected $primaryKey = 'id';
  protected $fillable = ['id','nombre' ];


  public function users()
  {
      return $this->hasMany(User::class, 'perfil', 'id');
  }
}


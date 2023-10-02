<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control_de_insumo extends Model
{
  use HasFactory;
  
  protected $table = 'control_de_insumo';
  protected $primaryKey = 'id';

  protected $fillable = [
    'id',
    'id_bitacora',
    'petro_stock_zar',
    'petro_stock_rec',
    'petro_pedido_lts',
    'petro_guia',
    'petro_consumo',
    'aceitemotor_stock_zar',
    'aceite_motor_stock_rec',
    'aceite_motor_pedido_lts',
    'aceite_motor_guia',
    'aceite_motor_consumo',
    'aceite_hid_stock_zar',
    'aceite_hid_stock_rec',
    'aceite_hid_stock_pedido_lts',
    'aceite_hid_guia',
    'aceite_hid_consumo',
    'grasa_stock_zar',
    'grasa_stock_rec',
    'grasa_pedido',
    'grasa_guia',
    'grasa_consumo',
    'id_usuario_c',
    'id_usuario_m',
    'estado'
  ];
  
}

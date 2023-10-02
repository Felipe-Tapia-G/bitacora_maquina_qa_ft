<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Estados;
use App\Models\Embarcacion;
use App\Models\Bitacora;

use App\Models\Motorista;
use App\Models\Informacion_general;
use App\Models\Folios;





class Bitacora_maquinaController extends Controller
{

    public function index()
    {



            // Verificar si el usuario está autenticado
    if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }


        $armador        = auth()->user()->armador;
        $bitacora =    Bitacora::leftjoin('motorista', 'motorista.id', '=','bitacora.motorista' )
                                ->leftjoin('embarcacion', 'embarcacion.id', '=','bitacora.pam' )
                                ->leftJoin('folios as f', 'f.id_bitacora', '=', 'bitacora.id')
                                ->leftJoin('users', 'users.id', '=', 'bitacora.id_usuario_c')

                                ->select(
                                            'bitacora.id as id',
                                            //'bitacora.pam as pam',
                                            'embarcacion.nombre as pam',
                                            'bitacora.fecha_zarpe as fecha_zarpe',
                                            'bitacora.fecha_recalada as fecha_recalada',
                                            'motorista.nombres as motorista',
                                            'bitacora.horas_navegac as horas_navegac',
                                            'bitacora.horas_operac as horas_operac',
                                            'f.folio as folio',
                                            'bitacora.created_at',
                                            'users.name',
                                            'bitacora.estado'

                                        )
                                ->where('bitacora.armador','=',$armador)
                                ->orderBy('bitacora.id', 'desc') // Se agrega esta línea para ordenar en orden descendente por el campo 'id'
                                ->get();

      return view('bitacora_maquina.index',compact('bitacora'));
    }

}

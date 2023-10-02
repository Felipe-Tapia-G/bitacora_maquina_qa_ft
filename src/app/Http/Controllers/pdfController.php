<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bitacora;
use App\Models\User;
use App\Models\Estados;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Control;


/*mantenedores bitacora maquina*/
use App\Models\Control_de_insumo;
use App\Models\Motor_principal_y_cm;
//use App\Models\Motores_aux;
use App\Models\Motores_auxiliares;
use App\Models\Motor_principal;
use App\Models\Motor_principal2;
use App\Models\Contra_marcha;
use App\Models\M_aux_babor;
use App\Models\Motor_auxiliar_estribor;
use App\Models\Estados_de_equipo_y_alarma;
use App\Models\Tabla_de_cambios;
use App\Models\Tablacambio_motoresaux;
use App\Models\Hyteks;








// inicio para validar errores de  fk
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
//fin  para validar errores de  fk

class pdfController extends Controller
{



/*
  public function mostrarPDF()
{
    $rutaPDF = public_path('pdf.pdf');

    return view('vista.pdf', compact('rutaPDF'));
}


*/


  public function pdf($id)
  {




    $tipo=1;

        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
          // Redireccionar al inicio de sesión u otra página según corresponda
          return redirect()->route('login');
      }

/*
    $bitacora =    Bitacora::leftjoin('motorista', 'motorista.id', '=','bitacora.motorista' )

                            ->select(
                                      'bitacora.id as id',
                                      'bitacora.pam as pam',
                                      'bitacora.fecha_zarpe as fecha_zarpe',
                                      'bitacora.fecha_recalada as fecha_recalada',
                                      'motorista.nombres as motorista',
                                      'motorista2.nombres as motorista2',
                                      'bitacora.horas_navegac as horas_navegac',
                                      'bitacora.horas_operac as horas_operac',
                                      'bitacora.obs as obs'
                                    )
                            ->where('bitacora.id','=',$id)
                            ->get();
*/

    $bitacora = Bitacora::leftJoin('motorista as m1', 'm1.id', '=', 'bitacora.motorista')
                        ->leftJoin('motorista as m2', 'm2.id', '=', 'bitacora.motorista2')
                        ->leftJoin('embarcacion as e1', 'e1.id', '=', 'bitacora.pam')
                        ->leftJoin('folios as f', 'f.id_bitacora', '=', 'bitacora.id')
                        ->select(
                                  'bitacora.id as id',
                                  'e1.nombre as pam',
                                  'bitacora.fecha_zarpe as fecha_zarpe',
                                  'bitacora.fecha_recalada as fecha_recalada',
                                  'm1.nombres as motorista',
                                  'm2.nombres as motorista2',
                                  'bitacora.horas_navegac as horas_navegac',
                                  'bitacora.horas_operac as horas_operac',
                                  'bitacora.obs as obs',
                                  'f.folio as folio'
                                )
                        ->where('bitacora.id', '=', $id)
                        ->get();


     $rango = Bitacora::leftJoin('embarcacion', 'embarcacion.id', '=', 'bitacora.pam')
                        ->where('bitacora.id', '=', $id)
                        ->pluck('embarcacion.cantidad_motores_aux')
                        ->first();

                        $controldeinsumo              =    Control_de_insumo::where('control_de_insumo.id_bitacora','=',$id)->get();
                        $motor_principal_y_cm         =    Motor_principal_y_cm::where('motor_principal_y_cm.id_bitacora','=',$id)->get();
                        $tabla_de_cambios             =    Tabla_de_cambios::where('tabla_de_cambios.id_bitacora','=',$id)->get();
                        $tablacambio_motoresaux       =    Tablacambio_motoresaux::where('tablacambio_motoresaux.id_bitacora','=',$id)->get();
                        //$motores_aux                  =    Motores_aux::where('motores_aux.id_bitacora','=',$id)->get();
                        $motores_aux                  =    Motores_auxiliares::where('motores_auxiliares.id_bitacora','=',$id)->get();
                        $motor_principal              =    Motor_principal::where('motor_principal.id_bitacora','=',$id)->get();
                       // $motor_principal2             =    Motor_principal2::where('motor_principal2.id_bitacora','=',$id)->get();
                        $contra_marcha                =    Contra_marcha::where('contra_marcha.id_bitacora','=',$id)->get();
                        $Hyteks                         =    Hyteks::where('hytek.id_bitacora','=',$id)->get();
                       // $m_aux_babor                  =    M_aux_babor::where('m_aux_babor.id_bitacora','=',$id)->get();
                        $a_aux_estribor               =    Motor_auxiliar_estribor::where('motor_auxiliar_estribor.id_bitacora','=',$id)->get();
                        //$estados_de_equipo_y_alarma   =    Estados_de_equipo_y_alarma::where('estados_de_equipo_y_alarma.id_bitacora','=',$id)->get();
                        $cantidad_maux                =    Motores_auxiliares::where('motores_auxiliares.id_bitacora','=',$id)->select('motores_auxiliares.numero_motor_aux')->get();
                        $cantidadRegistros            =    $cantidad_maux->count();
                       // $niveles_de_aceite            =     Niveles_de_aceite::all();
                         // return $cantidad_maux ;




                         $contra_marcha = DB::table('contra_marcha')
                                              ->leftjoin('niveles_de_aceite as a1', 'contra_marcha.naceite_0004', '=', 'a1.id')
                                              ->leftjoin('niveles_de_aceite as a2', 'contra_marcha.naceite_0408', '=', 'a2.id')
                                              ->leftjoin('niveles_de_aceite as a3', 'contra_marcha.naceite_0812', '=', 'a3.id')
                                              ->leftjoin('niveles_de_aceite as a4', 'contra_marcha.naceite_1216', '=', 'a4.id')
                                              ->leftjoin('niveles_de_aceite as a5', 'contra_marcha.naceite_1620', '=', 'a5.id')
                                              ->leftjoin('niveles_de_aceite as a6', 'contra_marcha.naceite_2024', '=', 'a6.id')
                                              ->select(
                                                        'contra_marcha.*',
                                                        'a1.nombre AS naceite_0004',
                                                        'a2.nombre AS naceite_0408',
                                                        'a3.nombre AS naceite_0812',
                                                        'a4.nombre AS naceite_1216',
                                                        'a5.nombre AS naceite_1620',
                                                        'a6.nombre AS naceite_2024')
                                              ->where('contra_marcha.id_bitacora', '=', $id)
                                              ->get();



                         $a_aux_estribor = DB::table('motor_auxiliar_estribor')
                                              ->leftjoin('niveles_de_aceite as a1', 'motor_auxiliar_estribor.naceite_0004', '=', 'a1.id')
                                              ->leftjoin('niveles_de_aceite as a2', 'motor_auxiliar_estribor.naceite_0408', '=', 'a2.id')
                                              ->leftjoin('niveles_de_aceite as a3', 'motor_auxiliar_estribor.naceite_0812', '=', 'a3.id')
                                              ->leftjoin('niveles_de_aceite as a4', 'motor_auxiliar_estribor.naceite_1216', '=', 'a4.id')
                                              ->leftjoin('niveles_de_aceite as a5', 'motor_auxiliar_estribor.naceite_1620', '=', 'a5.id')
                                              ->leftjoin('niveles_de_aceite as a6', 'motor_auxiliar_estribor.naceite_2024', '=', 'a6.id')
                                              ->select(
                                                        'motor_auxiliar_estribor.*',
                                                        'a1.nombre AS naceite_0004',
                                                        'a2.nombre AS naceite_0408',
                                                        'a3.nombre AS naceite_0812',
                                                        'a4.nombre AS naceite_1216',
                                                        'a5.nombre AS naceite_1620',
                                                        'a6.nombre AS naceite_2024')
                                              ->where('motor_auxiliar_estribor.id_bitacora', '=', $id)
                                              ->get();


                         $m_aux_babor = DB::table('m_aux_babor')
                                              ->leftjoin('niveles_de_aceite as a1', 'm_aux_babor.naceite_0004', '=', 'a1.id')
                                              ->leftjoin('niveles_de_aceite as a2', 'm_aux_babor.naceite_0408', '=', 'a2.id')
                                              ->leftjoin('niveles_de_aceite as a3', 'm_aux_babor.naceite_0812', '=', 'a3.id')
                                              ->leftjoin('niveles_de_aceite as a4', 'm_aux_babor.naceite_1216', '=', 'a4.id')
                                              ->leftjoin('niveles_de_aceite as a5', 'm_aux_babor.naceite_1620', '=', 'a5.id')
                                              ->leftjoin('niveles_de_aceite as a6', 'm_aux_babor.naceite_2024', '=', 'a6.id')
                                              ->select(
                                                        'm_aux_babor.*',
                                                        'a1.nombre AS naceite_0004',
                                                        'a2.nombre AS naceite_0408',
                                                        'a3.nombre AS naceite_0812',
                                                        'a4.nombre AS naceite_1216',
                                                        'a5.nombre AS naceite_1620',
                                                        'a6.nombre AS naceite_2024')
                                              ->where('m_aux_babor.id_bitacora', '=', $id)
                                              ->get();


                         $motor_principal = DB::table('motor_principal')
                                              ->leftjoin('niveles_de_aceite as a1', 'motor_principal.naceite_0004', '=', 'a1.id')
                                              ->leftjoin('niveles_de_aceite as a2', 'motor_principal.naceite_0408', '=', 'a2.id')
                                              ->leftjoin('niveles_de_aceite as a3', 'motor_principal.naceite_0812', '=', 'a3.id')
                                              ->leftjoin('niveles_de_aceite as a4', 'motor_principal.naceite_1216', '=', 'a4.id')
                                              ->leftjoin('niveles_de_aceite as a5', 'motor_principal.naceite_1620', '=', 'a5.id')
                                              ->leftjoin('niveles_de_aceite as a6', 'motor_principal.naceite_2024', '=', 'a6.id')
                                              ->select(
                                                        'motor_principal.*',
                                                        'a1.nombre AS naceite_0004',
                                                        'a2.nombre AS naceite_0408',
                                                        'a3.nombre AS naceite_0812',
                                                        'a4.nombre AS naceite_1216',
                                                        'a5.nombre AS naceite_1620',
                                                        'a6.nombre AS naceite_2024')
                                              ->where('motor_principal.id_bitacora', '=', $id)
                                              ->get();




                         $estados_de_equipo_y_alarma = DB::table('estados_de_equipo_y_alarma')
                                                      ->join('estados_equipos_y_alarmas AS a0', 'estados_de_equipo_y_alarma.alternador_mp', '=', 'a0.id')
                                                      ->join('estados_equipos_y_alarmas AS a1', 'estados_de_equipo_y_alarma.bba_pescado', '=', 'a1.id')
                                                      ->join('estados_equipos_y_alarmas AS a2', 'estados_de_equipo_y_alarma.alternador_ma', '=', 'a2.id')
                                                      ->join('estados_equipos_y_alarmas AS a3', 'estados_de_equipo_y_alarma.winche', '=', 'a3.id')
                                                      ->join('estados_equipos_y_alarmas AS a4', 'estados_de_equipo_y_alarma.luces', '=', 'a4.id')
                                                      ->join('estados_equipos_y_alarmas AS a5', 'estados_de_equipo_y_alarma.anet_winch', '=', 'a5.id')
                                                      ->join('estados_equipos_y_alarmas AS a6', 'estados_de_equipo_y_alarma.baterias', '=', 'a6.id')
                                                      ->join('estados_equipos_y_alarmas AS a7', 'estados_de_equipo_y_alarma.net_stacker', '=', 'a7.id')
                                                      ->join('estados_equipos_y_alarmas AS a8', 'estados_de_equipo_y_alarma.gobierno', '=', 'a8.id')
                                                      ->join('estados_equipos_y_alarmas AS a9', 'estados_de_equipo_y_alarma.racel', '=', 'a9.id')
                                                      ->join('estados_equipos_y_alarmas AS a10', 'estados_de_equipo_y_alarma.propulsion', '=', 'a10.id')
                                                      ->join('estados_equipos_y_alarmas AS a11', 'estados_de_equipo_y_alarma.sentina', '=', 'a11.id')
                                                      ->join('estados_equipos_y_alarmas AS a12', 'estados_de_equipo_y_alarma.bra_archique', '=', 'a12.id')
                                                      ->join('estados_equipos_y_alarmas AS a13', 'estados_de_equipo_y_alarma.p_mp', '=', 'a13.id')
                                                      ->join('estados_equipos_y_alarmas AS a14', 'estados_de_equipo_y_alarma.estanque', '=', 'a14.id')
                                                      ->join('estados_equipos_y_alarmas AS a15', 'estados_de_equipo_y_alarma.t_mp', '=', 'a15.id')
                                                      ->select(
                                                              'a0.nombre AS alternador_mp',
                                                              'a1.nombre AS bba_pescado',
                                                              'a2.nombre AS alternador_ma',
                                                              'a3.nombre AS winche',
                                                              'a4.nombre AS luces',
                                                              'a5.nombre AS anet_winch',
                                                              'a6.nombre AS baterias',
                                                              'a7.nombre AS net_stacker',
                                                              'a8.nombre AS gobierno',
                                                              'a9.nombre AS racel',
                                                              'a10.nombre AS propulsion',
                                                              'a11.nombre AS sentina',
                                                              'a12.nombre AS bra_archique',
                                                              'a13.nombre AS p_mp',
                                                              'a14.nombre AS estanque',
                                                              'a15.nombre AS t_mp'
                                                              )
                                                      ->where('estados_de_equipo_y_alarma.id_bitacora','=',$id)->get();




  //return $motores_aux;
      /* Muestreo de PDF*/
      $pdf = PDF::loadView('pdf.pdf',compact('bitacora','Hyteks','tabla_de_cambios','tablacambio_motoresaux','controldeinsumo','motor_principal_y_cm','motores_aux','motor_principal','contra_marcha','m_aux_babor','a_aux_estribor','estados_de_equipo_y_alarma','rango'));

      If($tipo == 1 ) //1= visualizar PDF
      {
        return $pdf->stream();
      }
      If($tipo == 2 ) //2= Descargar PDF
      {
        return $pdf->download($id.'.pdf');
      }

  }







}

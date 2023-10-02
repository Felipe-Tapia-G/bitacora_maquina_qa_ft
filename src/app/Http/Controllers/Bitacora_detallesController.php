<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Estados;
use App\Models\Embarcacion;
use App\Models\Bitacora;
use App\Models\Motorista;
//use App\Models\Informacion_general;
use App\Models\Control_de_insumo;
use App\Models\Motor_principal_y_cm;
use App\Models\Tablacambio_motoresaux;



use App\Models\Motores_auxiliares;
use App\Models\Motores_aux;







use App\Models\Niveles_de_aceite;
use App\Models\Motor_principal;
use App\Models\Motor_principal2;
use App\Models\Contra_marcha;
use App\Models\Hyteks;
use App\Models\M_aux_babor;
use App\Models\Motor_auxiliar_estribor;
use App\Models\Estados_de_equipo_y_alarma;
use App\Models\Estados_equipos_y_alarmas;
use App\Models\Tabla_de_cambios;
use App\Models\Niveles_aceites;
use App\Models\Folios;


use PDF;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\View;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



class Bitacora_detallesController extends Controller
{


/*
  public function valida_estado_bitacora($id)
  {
     // Validación para evitar modificaciones en la bitácora por parte de usuarios con perfil de registrador cuando la bitácora está cerrada.

  $perfil = auth()->user()->perfil;

  if ($perfil == 1) {
      $barco = bitacora::where('id', $id)->first();

      if ($barco->estado == 2) {
        return redirect('/home')->with('mensaje', 'No tienes permisos para modificar la bitácora');
      }
  }




  }
  */

  public function index($id)
  {





      // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }
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
                                  'f.folio as folio',

                                )
                        ->where('bitacora.id', '=', $id)
                        ->get();

        // Ahora, guardamos el valor del folio en una variable
        $folio = $bitacora->isEmpty() ? null : $bitacora[0]->folio;


                        $embarcacion_cantidad_motores_aux = Bitacora::leftJoin('embarcacion', 'embarcacion.id', '=', 'bitacora.pam')
                                                                    ->where('bitacora.id', '=', $id)
                                                                    ->pluck('embarcacion.cantidad_motores_aux')
                                                                    ->first();



                         $rango = Bitacora::leftJoin('embarcacion', 'embarcacion.id', '=', 'bitacora.pam')
                                                                    ->where('bitacora.id', '=', $id)
                                                                    ->pluck('embarcacion.cantidad_motores_aux')
                                                                    ->first();


                        $controldeinsumo              =    Control_de_insumo::where('control_de_insumo.id_bitacora','=',$id)->get();
                        $motor_principal_y_cm         =    Motor_principal_y_cm::where('motor_principal_y_cm.id_bitacora','=',$id)->get();
                        $tabla_de_cambios             =    Tabla_de_cambios::where('tabla_de_cambios.id_bitacora','=',$id)->get();
                        //$motores_aux                  =    Motores_aux::where('motores_aux.id_bitacora','=',$id)->get();
                        $motores_aux                  =    Motores_auxiliares::where('motores_auxiliares.id_bitacora','=',$id)->get();
                        $tablacambio_motoresaux       =    tablacambio_motoresaux::where('tablacambio_motoresaux.id_bitacora','=',$id)->get();
                        $motor_principal              =    Motor_principal::where('motor_principal.id_bitacora','=',$id)->get();
                       // $motor_principal2             =    Motor_principal2::where('motor_principal2.id_bitacora','=',$id)->get();
                        $contra_marcha                =    Contra_marcha::where('contra_marcha.id_bitacora','=',$id)->get();
                        $Hyteks                       =    Hyteks::where('hytek.id_bitacora','=',$id)->get();
                       // $m_aux_babor                 =    M_aux_babor::where('m_aux_babor.id_bitacora','=',$id)->get();
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


                          $pdf = PDF::loadView('pdf.pdf', compact('bitacora','Hyteks','tabla_de_cambios','tablacambio_motoresaux','motor_principal_y_cm','controldeinsumo','motor_principal_y_cm','motores_aux','motor_principal','contra_marcha','m_aux_babor','a_aux_estribor','estados_de_equipo_y_alarma','embarcacion_cantidad_motores_aux','rango'));

                          $pdfData = $pdf->output();
                          $pdfBase64 = base64_encode($pdfData);

                          $pdfView = View::make('bitacora_detalles.index', compact('pdfBase64','id','folio','embarcacion_cantidad_motores_aux','cantidad_maux','cantidadRegistros'));

                          return new Response($pdfView);

  }







/*
|--------------------------------------------------------------------------
| MANTENEDOR - BITACORA - BITACORA DE MAQUINA
|--------------------------------------------------------------------------
*/


  public function bitacora($id)
  {


                      // Verificar si el usuario está autenticado
                      if (!auth()->check()) {
                        // Redireccionar al inicio de sesión u otra página según corresponda
                        return redirect()->route('login');
                    }


                  $armador              = auth()->user()->armador;
                  $embarcacion          = Embarcacion::where('estado',1)->where('armador','=',$armador)->where('estado','=',1)->get();
                  $motorista            = Motorista::where('estado',1)->where('armador','=',$armador)->where('estado','=',1)->get();
                  $bitacora             = Bitacora::where('id', $id)->first();

                if ($bitacora){
                    return view('bdm_mantenedores.bitacora_modifica', compact( 'id', 'bitacora','embarcacion','motorista'));
                } else {
                    return view('bdm_mantenedores.bitacora_modifica',compact('id'));
                }



  }


  public function bitacora_c()
  {



          // Verificar si el usuario está autenticado
            if(!auth()->check())
            {
                // Redireccionar al inicio de sesión u otra página según corresponda
                return redirect()->route('login');
            }


            $armador              = auth()->user()->armador;
            $embarcacion          = Embarcacion::where('estado',1)->where('armador','=',$armador)->where('estado','=',1)->get();
            $motorista            = Motorista::where('estado',1)->where('armador','=',$armador)->where('estado','=',1)->get();

            return view('bdm_mantenedores.bitacora_crear', compact( 'embarcacion','motorista'));





  }







  public function bitacora_modificar(Request $request)
  {

    try{

          // Verificar si el usuario está autenticado
          if (!auth()->check())
          {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
          }

            $inputs         = $request->all();
            $id_usuario     = auth()->user()->id;
            $id_bitacora    = $inputs['id_bitacora'];

            $bitacora = bitacora::where('id', $id_bitacora)->first();

            if ($bitacora)
            {
                // Modificar la información existente

               /* $bitacora->pam            =  $inputs['pam'];*/
                $bitacora->fecha_zarpe    =  $inputs['fecha_zarpe'];
                $bitacora->fecha_recalada =  $inputs['fecha_recalada'];
                $bitacora->motorista      =  $inputs['motorista'];
                $bitacora->motorista2     =  $inputs['motorista2'];
                $bitacora->horas_operac   =  $inputs['horas_operac'];
                $bitacora->horas_navegac  =  $inputs['horas_navegac'];
                $bitacora->obs            =  $inputs['obs'];
                $bitacora->id_usuario_m   =  $id_usuario;
                $bitacora->estado         =  1; //1=habilitado
                $bitacora->save();


                return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Bitacora, modificado correctamente!', 'type' => 'success']);
            }

          } catch (\Exception $e) {
            return redirect()->back()->with([
                'alert' => 'Error!',
                'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió un error al modificarlos: ' . $e->getMessage(),
                'type' => 'error'
            ]);
        }


  }



  public function bitacora_crear(Request $request)
  {

        try{
          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }




            $inputs         = $request->all();
            $id_usuario     = auth()->user()->id;
            $armador        = auth()->user()->armador;



            // Guardar nueva información
            $bitacora  =   new Bitacora;
            $bitacora->pam            =   $inputs['pam'];;
            $bitacora->fecha_zarpe    =   $inputs['fecha_zarpe'];
            $bitacora->fecha_recalada =   $inputs['fecha_recalada'];
            $bitacora->motorista      =   $inputs['motorista'];
            $bitacora->motorista2     =   $inputs['motorista2'];
            $bitacora->horas_operac   =   $inputs['horas_operac'];
            $bitacora->horas_navegac  =   $inputs['horas_navegac'];
            $bitacora->obs            =   $inputs['obs'];
            $bitacora->armador        =   $armador;
            $bitacora->id_usuario_c   =   $id_usuario;
            $bitacora->estado         =   1; //1=habilitado
            $bitacora->save();

            $id = $bitacora->id;


             //FOLIO
             try {
              $ultimoFolio = Folios::where('id_embarcacion', $inputs['pam'])->orderBy('folio', 'desc')->first();

              if ($ultimoFolio) {
                  // Si se encontró un folio existente, incrementar en 1 el valor
                  $folio = $ultimoFolio->folio + 1;
              } else {
                  // Si no se encontró un folio existente, establecer el valor inicial en 1
                  $folio = 1;
              }

              // Crear un nuevo registro de folio
              $folios = new Folios;
              $folios->id_embarcacion =   $inputs['pam'];
              $folios->id_bitacora    =   $id;
              $folios->folio          =   $folio;
              $folios->estado         =   1; // 1 = habilitado
              $folios->id_usuario_c   =   $id_usuario;
              $folios->armador        =   $armador;
              $folios->save();

              // Redirigir a la ventana anterior con un mensaje de éxito y el folio como variable en la URL
            //  return redirect()->route('bitacora_detalles.index', ['id_bitacora' => $id]);
              return Redirect::route('bitacora_detalles.index', ['id_bitacora' => $id, 'folio' => $folio])->with('success', 'El registro de folio se ha guardado correctamente.');

          } catch (\Exception $e) {
              // Redirigir a la ventana anterior con un mensaje de error
              return Redirect::back()->with('error', 'Error al guardar el registro de folio: ' . $e->getMessage());
          }

          //  return redirect()->route('bitacora_detalles.index', ['id_bitacora' => $id]);


        } catch (\Exception $e) {
          return redirect()->back()->with([
              'alert' => 'Error!',
              'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
              'type' => 'error'
          ]);
      }


  }



  public function calcula_motoraux(Request $request)
  {


    $inputs                   = $request->all();

    $id_bitacora              = $inputs['id_bitacora'];
    $zarpe                    = $inputs['zarpe'];
    $recalada                 = $inputs['recalada'];
    $numero_motor_aux         = $inputs['numero_motor_aux'];

    $horas_aceite             = $inputs['horas_aceite'];
    $hora_filtro_aceite       = $inputs['hora_filtro_aceite'];
    $hora_filtro_combustible  = $inputs['hora_filtro_combustible'];
    $hora_filtro_racor        = $inputs['hora_filtro_racor'];
    $hora_filtro_aire         = $inputs['hora_filtro_aire'];



    $id_usuario               = auth()->user()->id;
    $resultado                = $recalada - $zarpe;

    $folio = Folios::where('id_bitacora', $id_bitacora)->first();

           // CREACION DE TABLA PASO //
//return  $id_bitacora;


  if($folio->folio > 1){
            $tablacambio_motoresaux = Tablacambio_motoresaux::where('id_bitacora', $id_bitacora)->where('numero_motor_aux', $numero_motor_aux)->first();
            //$tabla_de_cambios       = tablacambio_motoresaux::where('id_bitacora', $id_bitacora)->first(); /*validar despues*/
            //$motor_principal_y_cm = Motor_principal_y_cm::where('id_bitacora', $id_bitacora)->first();
            $motores_auxiliares = Motores_auxiliares::where('id_bitacora', $id_bitacora)->where('numero_motor_aux', $numero_motor_aux)->first();

    ////////////////////////

          $barco = bitacora::where('id', $id_bitacora)->first();

          $pam_valor = $barco->pam;

          $penultimo_barco = bitacora::where('id', '<', $id_bitacora)
                                      ->where('pam', $pam_valor)
                                      ->orderBy('id', 'desc')
                                      ->first();

          //busca datos de la bitacora anterior
          //$motor_principal_y_cm_penultima = Motor_principal_y_cm::where('id_bitacora', $penultimo_barco->id)->first();
          $motores_auxiliares_penultima     = Motores_auxiliares::where('id_bitacora', $penultimo_barco->id)->where('numero_motor_aux', $numero_motor_aux)->first();
         // $tabla_de_cambios_penultima     = Tabla_de_cambios::where('id_bitacora', $penultimo_barco->id)->first();
          $tablacambio_motoresaux_penultima = Tablacambio_motoresaux::where('id_bitacora', $penultimo_barco->id)->where('numero_motor_aux', $numero_motor_aux)->first();




          $c_actual     =  $resultado;
          $c_anterior   = ($motores_auxiliares_penultima->horas_ma_recalada ?? 0) - ($motores_auxiliares_penultima->horas_ma_zarpe ?? 0);
          $resul        =  $c_anterior+$c_actual;


        // Validación
        $validacion = Tablacambio_motoresaux::where('id_bitacora', $id_bitacora)->where('numero_motor_aux', $numero_motor_aux)->exists();


        if ($validacion)
        {
            // Si existen datos para el id_bitacora dado

            $tablacambio_motoresaux->horometro_Aceite                 = $resul;
            $tablacambio_motoresaux->horometro_filtro_aceite          = $resul;
            $tablacambio_motoresaux->horometro_fitro_combustible      = $resul;
            $tablacambio_motoresaux->horometro_filtro_racor           = $resul;
            $tablacambio_motoresaux->horometro_filtro_aire            = $resul;


            $tablacambio_motoresaux->fecha_aceite                     = $tablacambio_motoresaux_penultima->fecha_aceite;
            $tablacambio_motoresaux->fecha_filtro_aceite              = $tablacambio_motoresaux_penultima->fecha_filtro_aceite;
            $tablacambio_motoresaux->fecha_fitro_conbustible          = $tablacambio_motoresaux_penultima->fecha_fitro_conbustible;
            $tablacambio_motoresaux->fecha_filtro_racor               = $tablacambio_motoresaux_penultima->fecha_filtro_racor;
            $tablacambio_motoresaux->fecha_filtro_aire                = $tablacambio_motoresaux_penultima->fecha_filtro_aire;


            $tablacambio_motoresaux->duracion_aceite                  = $tablacambio_motoresaux_penultima->duracion_aceite;
            $tablacambio_motoresaux->duracion_filtro_aceite           = $tablacambio_motoresaux_penultima->duracion_filtro_aceite;
            $tablacambio_motoresaux->duracion_filtro_combustible      = $tablacambio_motoresaux_penultima->duracion_filtro_combustible;
            $tablacambio_motoresaux->duracion_filtro_racor            = $tablacambio_motoresaux_penultima->duracion_filtro_racor;
            $tablacambio_motoresaux->duracion_filtro_aire             = $tablacambio_motoresaux_penultima->duracion_filtro_aire;



            $tablacambio_motoresaux->id_usuario_m                      = $id_usuario;
            $tablacambio_motoresaux->estado                            = 1; // Habilitado
            $tablacambio_motoresaux->save();


        }else{
                  // Si no existen datos crea la tabla de cambio con datos
                  // Haz otra cosa

                  $tablacambio_motoresaux = new Tablacambio_motoresaux;
                  $tablacambio_motoresaux->id_bitacora                      = $id_bitacora;
                  $tablacambio_motoresaux->horometro_Aceite                 = $resul;
                  $tablacambio_motoresaux->horometro_filtro_aceite          = $resul;
                  $tablacambio_motoresaux->horometro_fitro_combustible      = $resul;
                  $tablacambio_motoresaux->horometro_filtro_racor           = $resul;
                  $tablacambio_motoresaux->horometro_filtro_aire            = $resul;

                  $tablacambio_motoresaux->fecha_aceite                     = $tablacambio_motoresaux_penultima->fecha_aceite;
                  $tablacambio_motoresaux->fecha_filtro_aceite              = $tablacambio_motoresaux_penultima->fecha_filtro_aceite;
                  $tablacambio_motoresaux->fecha_fitro_conbustible          = $tablacambio_motoresaux_penultima->fecha_fitro_conbustible;
                  $tablacambio_motoresaux->fecha_filtro_racor               = $tablacambio_motoresaux_penultima->fecha_filtro_racor;
                  $tablacambio_motoresaux->fecha_filtro_aire                = $tablacambio_motoresaux_penultima->fecha_filtro_aire;


                  $tablacambio_motoresaux->duracion_aceite                  = $tablacambio_motoresaux_penultima->duracion_aceite;
                  $tablacambio_motoresaux->duracion_filtro_aceite           = $tablacambio_motoresaux_penultima->duracion_filtro_aceite;
                  $tablacambio_motoresaux->duracion_filtro_combustible      = $tablacambio_motoresaux_penultima->duracion_filtro_combustible;
                  $tablacambio_motoresaux->duracion_filtro_racor            = $tablacambio_motoresaux_penultima->duracion_filtro_racor;
                  $tablacambio_motoresaux->duracion_filtro_aire             = $tablacambio_motoresaux_penultima->duracion_filtro_aire;

                  $tablacambio_motoresaux->numero_motor_aux                       = $numero_motor_aux;
                  $tablacambio_motoresaux->id_usuario_c                           = $id_usuario;
                  $tablacambio_motoresaux->estado                                 = 1; // Habilitado
                  $tablacambio_motoresaux->save();




              }



                  // Cálculo de horas de operación
                  $horas_operacion_bitacora = $recalada - ($motores_auxiliares_penultima->horas_ma_recalada ?? 0);


               /*   // Actualización de la bitácora
                  $bitacora = Bitacora::find($id_bitacora); // Obtener el registro de la bitácora por su ID

                  if ($bitacora) {
                      $bitacora->horas_operac = $horas_operacion_bitacora; // Asignar las horas de operación calculadas
                      $bitacora->id_usuario_m = $id_usuario;
                      $bitacora->save(); // Guardar los cambios en la base de datos
                  }
                  */

              //CALCULO DE PORTAJE PARA SEMAFORO

          /* llena  los input de duracion de la la tabla motor principal y cm*/




              $duracion_aceite                = $tablacambio_motoresaux_penultima['duracion_aceite']              -   $tablacambio_motoresaux_penultima['horometro_Aceite']              - $horas_aceite;
              $duracion_filtro_aceite         = $tablacambio_motoresaux_penultima['duracion_filtro_aceite']       -   $tablacambio_motoresaux_penultima['horometro_filtro_aceite']       - $hora_filtro_aceite;
              $duracion_filtro_combustible    = $tablacambio_motoresaux_penultima['duracion_filtro_combustible']  -   $tablacambio_motoresaux_penultima['horometro_fitro_combustible']   - $hora_filtro_combustible;
              $duracion_filtro_racor          = $tablacambio_motoresaux_penultima['duracion_filtro_racor']        -   $tablacambio_motoresaux_penultima['horometro_filtro_racor']        - $hora_filtro_racor;
              $duracion_filtro_aire           = $tablacambio_motoresaux_penultima['duracion_filtro_aire']         -   $tablacambio_motoresaux_penultima['horometro_filtro_aire']         - $hora_filtro_aire;



              $resultado_calculo = [
                                      'duracion_aceite'               => $duracion_aceite,
                                      'duracion_filtro_aceite'        => $duracion_filtro_aceite,
                                      'duracion_filtro_combustible'   => $duracion_filtro_combustible,
                                      'duracion_filtro_racor'         => $duracion_filtro_racor,
                                      'duracion_filtro_aire'          => $duracion_filtro_aire

                                    ];
        //caLculo para semaforo
        $sema_duracion_aceite                   = (($tablacambio_motoresaux_penultima['duracion_aceite']               -   $tablacambio_motoresaux_penultima['horometro_Aceite']             - $horas_aceite)            /$tablacambio_motoresaux['duracion_aceite'])*100 ;
        $sema_duracion_filtro_aceite            = (($tablacambio_motoresaux_penultima['duracion_filtro_aceite']        -   $tablacambio_motoresaux_penultima['horometro_filtro_aceite']      - $hora_filtro_aceite)      /$tablacambio_motoresaux['duracion_filtro_aceite'])*100;
        $sema_duracion_filtro_combustible       = (($tablacambio_motoresaux_penultima['duracion_filtro_combustible']   -   $tablacambio_motoresaux_penultima['horometro_fitro_combustible']  - $hora_filtro_combustible) /$tablacambio_motoresaux['duracion_filtro_combustible'])*100;

        $sema_duracion_filtro_racor             = (($tablacambio_motoresaux_penultima['duracion_filtro_racor']         -   $tablacambio_motoresaux_penultima['horometro_filtro_racor']       - $hora_filtro_racor)       /$tablacambio_motoresaux['duracion_filtro_racor'])*100;
        $sema_duracion_filtro_aire              = (($tablacambio_motoresaux_penultima['duracion_filtro_aire']          -   $tablacambio_motoresaux_penultima['horometro_filtro_aire']        - $hora_filtro_aire)        /$tablacambio_motoresaux['duracion_filtro_aire'])*100;


        $sema_resultado_calculo = [
                                'duracion_aceite'               => $sema_duracion_aceite,
                                'duracion_filtro_aceite'        => $sema_duracion_filtro_aceite,
                                'duracion_filtro_combustible'   => $sema_duracion_filtro_combustible,
                                'duracion_filtro_racor'         => $sema_duracion_filtro_racor,
                                'duracion_filtro_aire'          => $sema_duracion_filtro_aire

                              ];



                                  return response()->json([
                                                            'resultado_calculo' => $resultado_calculo,
                                                            'sema_resultado_calculo' => $sema_resultado_calculo,
                                                            'respuesta' => 'ok'
                                                          ]);


    }else{

      return response()->json([

                              'respuesta' => 'sindatos'
                            ]);

    }

  }


  public function calcula_motorprincipalcm(Request $request)
  {



      $inputs                    = $request->all();

      $id_bitacora              = $inputs['id_bitacora'];
      $zarpe                    = $inputs['zarpe'];
      $recalada                 = $inputs['recalada'];
      $hora_aceite_hytek        = $inputs['hora_aceite_hytek'];
      $hora_filtro_hytek        = $inputs['hora_filtro_hytek'];
      $horas_filtro_de_aire_mp  = $inputs['horas_filtro_de_aire_mp'];
      $horas_aceite_mp          = $inputs['horas_aceite_mp'];
      $hora_filtro_ac_mp        = $inputs['hora_filtro_ac_mp'];
      $hora_filtro_petr_mp      = $inputs['hora_filtro_petr_mp'];
      $hora_filtro_racor        = $inputs['hora_filtro_racor'];
      $horas_aceite_cm          = $inputs['horas_aceite_cm'];
      $hora_filtro_ac_cm        = $inputs['hora_filtro_ac_cm'];




      /*
      $id_bitacora              = $request->input('id_bitacora');
      $zarpe                    = $request->input('zarpe');
      $recalada                 = $request->input('recalada');

      $hora_aceite_hytek        = $request->input('hora_aceite_hytek');
      $hora_filtro_hytek        = $request->input('hora_filtro_hytek');
      $horas_filtro_de_aire_mp  = $request->input('horas_filtro_de_aire_mp');
      $horas_aceite_mp          = $request->input('horas_aceite_mp');
      $hora_filtro_ac_mp        = $request->input('hora_filtro_ac_mp');
      $hora_filtro_petr_mp      = $request->input('hora_filtro_petr_mp');
      $hora_filtro_racor        = $request->input('hora_filtro_racor');
      $horas_aceite_cm          = $request->input('horas_aceite_cm');
      $hora_filtro_ac_cm        = $request->input('hora_filtro_ac_cm');

      */

      $id_usuario               = auth()->user()->id;
      $resultado                = $recalada - $zarpe;

      $folio = Folios::where('id_bitacora', $id_bitacora)->first();
             // CREACION DE TABLA PASO //


      //return $folio->folio;
    if($folio->folio > 1){

              $tabla_de_cambios     = Tabla_de_cambios::where('id_bitacora', $id_bitacora)->first(); /*validar despues*/
              $motor_principal_y_cm = Motor_principal_y_cm::where('id_bitacora', $id_bitacora)->first();

////////////////////////

            $barco = bitacora::where('id', $id_bitacora)->first();

            $pam_valor = $barco->pam;

            $penultimo_barco = bitacora::where('id', '<', $id_bitacora)
                                        ->where('pam', $pam_valor)
                                        ->orderBy('id', 'desc')
                                        ->first();

            //busca datos de la bitacora anterior
            $motor_principal_y_cm_penultima = Motor_principal_y_cm::where('id_bitacora', $penultimo_barco->id)->first();
            $tabla_de_cambios_penultima     = Tabla_de_cambios::where('id_bitacora', $penultimo_barco->id)->first();


            $c_actual     =  $resultado;
            $c_anterior   = ($motor_principal_y_cm_penultima->horasmotor_principal_recalada ?? 0) - ($motor_principal_y_cm_penultima->horasmotor_principal_zarpe ?? 0);
            $resul        =  $c_anterior+$c_actual;


          // Validación
          $validacion = Tabla_de_cambios::where('id_bitacora', $id_bitacora)->exists();


          if ($validacion)
          {
              // Si existen datos para el id_bitacora dado

              $tabla_de_cambios->horometro_mp_aceite               = $resul;
              $tabla_de_cambios->horometro_mp_filtro_combustible   = $resul;
              $tabla_de_cambios->horometro_mp_filtro_aceite        = $resul;
              $tabla_de_cambios->horometro_mp_filtro_racor         = $resul;
              $tabla_de_cambios->horometro_cm_aceite               = $resul;
              $tabla_de_cambios->horometro_cm_filtro_aceite        = $resul;
              $tabla_de_cambios->horometro_hy_aceite               = $resul;
              $tabla_de_cambios->horometro_hy_filtro_aceite        = $resul;
              $tabla_de_cambios->horometro_mp_filtro_aire          = $resul;

              $tabla_de_cambios->fecha_mp_aceite                  = $tabla_de_cambios_penultima->fecha_mp_aceite;
              $tabla_de_cambios->fecha_mp_filtro_combustible      = $tabla_de_cambios_penultima->fecha_mp_filtro_combustible;
              $tabla_de_cambios->fecha_mp_filtro_aceite           = $tabla_de_cambios_penultima->fecha_mp_filtro_aceite;
              $tabla_de_cambios->fecha_cm_filtro_aceite           = $tabla_de_cambios_penultima->fecha_cm_filtro_aceite;
              $tabla_de_cambios->fecha_mp_filtro_racor            = $tabla_de_cambios_penultima->fecha_mp_filtro_racor;
              $tabla_de_cambios->fecha_mp_filtro_aire             = $tabla_de_cambios_penultima->fecha_mp_filtro_aire;
              $tabla_de_cambios->fecha_cm_aceite                  = $tabla_de_cambios_penultima->fecha_cm_aceite;
              $tabla_de_cambios->fecha_hy_aceite                  = $tabla_de_cambios_penultima->fecha_hy_aceite;
              $tabla_de_cambios->fecha_hy_filtro_aceite           = $tabla_de_cambios_penultima->fecha_hy_filtro_aceite;

              $tabla_de_cambios->duracion_mp_filtro_aire          = $tabla_de_cambios_penultima->duracion_mp_filtro_aire;
              $tabla_de_cambios->duracion_mp_aceite               = $tabla_de_cambios_penultima->duracion_mp_aceite;
              $tabla_de_cambios->duracion_mp_filtro_combustible   = $tabla_de_cambios_penultima->duracion_mp_filtro_combustible;
              $tabla_de_cambios->duracion_mp_filtro_aceite        = $tabla_de_cambios_penultima->duracion_mp_filtro_aceite;
              $tabla_de_cambios->duracion_cm_filtro_aceite        = $tabla_de_cambios_penultima->duracion_cm_filtro_aceite;
              $tabla_de_cambios->duracion_mp_filtro_racor         = $tabla_de_cambios_penultima->duracion_mp_filtro_racor;
              $tabla_de_cambios->duracion_cm_aceite               = $tabla_de_cambios_penultima->duracion_cm_aceite;
              $tabla_de_cambios->duracion_hy_aceite               = $tabla_de_cambios_penultima->duracion_hy_aceite;
              $tabla_de_cambios->duracion_hy_filtro_aceite        = $tabla_de_cambios_penultima->duracion_hy_filtro_aceite;


              $tabla_de_cambios->id_usuario_m                      = $id_usuario;
              $tabla_de_cambios->estado                            = 1; // Habilitado
              $tabla_de_cambios->save();


          }else{
                    // Si no existen datos crea la tabla de cambio con datos
                    // Haz otra cosa

                    $tabla_de_cambios = new Tabla_de_cambios;
                    $tabla_de_cambios->id_bitacora                       = $id_bitacora;
                    $tabla_de_cambios->horometro_mp_aceite               = $resul;
                    $tabla_de_cambios->horometro_mp_filtro_combustible   = $resul;
                    $tabla_de_cambios->horometro_mp_filtro_aceite        = $resul;
                    $tabla_de_cambios->horometro_mp_filtro_racor         = $resul;
                    $tabla_de_cambios->horometro_cm_aceite               = $resul;
                    $tabla_de_cambios->horometro_cm_filtro_aceite        = $resul;
                    $tabla_de_cambios->horometro_hy_aceite               = $resul;
                    $tabla_de_cambios->horometro_hy_filtro_aceite        = $resul;
                    $tabla_de_cambios->horometro_mp_filtro_aire          = $resul;

                    $tabla_de_cambios->fecha_mp_aceite                  = $tabla_de_cambios_penultima->fecha_mp_aceite;
                    $tabla_de_cambios->fecha_mp_filtro_combustible      = $tabla_de_cambios_penultima->fecha_mp_filtro_combustible;
                    $tabla_de_cambios->fecha_mp_filtro_aceite           = $tabla_de_cambios_penultima->fecha_mp_filtro_aceite;
                    $tabla_de_cambios->fecha_cm_filtro_aceite           = $tabla_de_cambios_penultima->fecha_cm_filtro_aceite;
                    $tabla_de_cambios->fecha_mp_filtro_racor            = $tabla_de_cambios_penultima->fecha_mp_filtro_racor;
                    $tabla_de_cambios->fecha_mp_filtro_aire             = $tabla_de_cambios_penultima->fecha_mp_filtro_aire;
                    $tabla_de_cambios->fecha_cm_aceite                  = $tabla_de_cambios_penultima->fecha_cm_aceite;
                    $tabla_de_cambios->fecha_hy_aceite                  = $tabla_de_cambios_penultima->fecha_hy_aceite;
                    $tabla_de_cambios->fecha_hy_filtro_aceite           = $tabla_de_cambios_penultima->fecha_hy_filtro_aceite;

                    $tabla_de_cambios->duracion_mp_filtro_aire          = $tabla_de_cambios_penultima->duracion_mp_filtro_aire;
                    $tabla_de_cambios->duracion_mp_aceite               = $tabla_de_cambios_penultima->duracion_mp_aceite;
                    $tabla_de_cambios->duracion_mp_filtro_combustible   = $tabla_de_cambios_penultima->duracion_mp_filtro_combustible;
                    $tabla_de_cambios->duracion_mp_filtro_aceite        = $tabla_de_cambios_penultima->duracion_mp_filtro_aceite;
                    $tabla_de_cambios->duracion_cm_filtro_aceite        = $tabla_de_cambios_penultima->duracion_cm_filtro_aceite;
                    $tabla_de_cambios->duracion_mp_filtro_racor         = $tabla_de_cambios_penultima->duracion_mp_filtro_racor;
                    $tabla_de_cambios->duracion_cm_aceite               = $tabla_de_cambios_penultima->duracion_cm_aceite;
                    $tabla_de_cambios->duracion_hy_aceite               = $tabla_de_cambios_penultima->duracion_hy_aceite;
                    $tabla_de_cambios->duracion_hy_filtro_aceite        = $tabla_de_cambios_penultima->duracion_hy_filtro_aceite;

                    $tabla_de_cambios->id_usuario_c                      = $id_usuario;
                    $tabla_de_cambios->estado                            = 1; // Habilitado
                    $tabla_de_cambios->save();




                }



                    // Cálculo de horas de operación
                    //$horas_operacion_bitacora = $recalada - ($motor_principal_y_cm_penultima->horasmotor_principal_recalada ?? 0);
                    $horas_operacion_bitacora = $recalada - $zarpe;


                    // Actualización de la bitácora
                    $bitacora = Bitacora::find($id_bitacora); // Obtener el registro de la bitácora por su ID

                    if ($bitacora) {
                        $bitacora->horas_operac = $horas_operacion_bitacora; // Asignar las horas de operación calculadas
                        $bitacora->id_usuario_m = $id_usuario;
                        $bitacora->save(); // Guardar los cambios en la base de datos
                    }


                //CALCULO DE PORTAJE PARA SEMAFORO

            /* llena  los input de duracion de la la tabla motor principal y cm*/

                $duracion_mp_aceite               = $tabla_de_cambios_penultima['duracion_mp_aceite']              -   $tabla_de_cambios_penultima['horometro_mp_aceite']             - $horas_aceite_mp;
                $duracion_mp_filtro_combustible   = $tabla_de_cambios_penultima['duracion_mp_filtro_combustible']  -   $tabla_de_cambios_penultima['horometro_mp_filtro_combustible'] - $hora_filtro_petr_mp;
                $duracion_mp_filtro_aceite        = $tabla_de_cambios_penultima['duracion_mp_filtro_aceite']       -   $tabla_de_cambios_penultima['horometro_mp_filtro_aceite']      - $hora_filtro_ac_mp;
                $duracion_mp_filtro_racor         = $tabla_de_cambios_penultima['duracion_mp_filtro_racor']        -   $tabla_de_cambios_penultima['horometro_mp_filtro_racor']       - $hora_filtro_racor;
                $duracion_mp_filtro_aire          = $tabla_de_cambios_penultima['duracion_mp_filtro_aire']         -   $tabla_de_cambios_penultima['horometro_mp_filtro_aire']        - $horas_filtro_de_aire_mp;
                $duracion_cm_aceite               = $tabla_de_cambios_penultima['duracion_cm_aceite']              -   $tabla_de_cambios_penultima['horometro_cm_aceite']             - $horas_aceite_cm;
                $duracion_cm_filtro_aceite        = $tabla_de_cambios_penultima['duracion_cm_filtro_aceite']       -   $tabla_de_cambios_penultima['horometro_cm_filtro_aceite']      - $hora_filtro_ac_cm;
                $duracion_hy_aceite               = $tabla_de_cambios_penultima['duracion_hy_aceite']              -   $tabla_de_cambios_penultima['horometro_hy_aceite']             - $hora_aceite_hytek;
                $duracion_hy_filtro_aceite        = $tabla_de_cambios_penultima['duracion_hy_filtro_aceite']       -   $tabla_de_cambios_penultima['horometro_hy_filtro_aceite']      - $hora_filtro_hytek ;


                $resultado_calculo = [
                                        'duracion_mp_aceite'              => $duracion_mp_aceite,
                                        'duracion_mp_filtro_combustible'  => $duracion_mp_filtro_combustible,
                                        'duracion_mp_filtro_aceite'       => $duracion_mp_filtro_aceite,
                                        'duracion_mp_filtro_racor'        => $duracion_mp_filtro_racor,
                                        'duracion_mp_filtro_aire'         => $duracion_mp_filtro_aire,
                                        'duracion_cm_aceite'              => $duracion_cm_aceite,
                                        'duracion_cm_filtro_aceite'       => $duracion_cm_filtro_aceite,
                                        'duracion_hy_aceite'              => $duracion_hy_aceite,
                                        'duracion_hy_filtro_aceite'       => $duracion_hy_filtro_aceite
                                      ];
          //caLculo para semaforo
          $sema_duracion_mp_aceite               = (($tabla_de_cambios_penultima['duracion_mp_aceite']              -   $tabla_de_cambios_penultima['horometro_mp_aceite']             - $horas_aceite_mp)         /$tabla_de_cambios['duracion_mp_aceite'])*100 ;
          $sema_duracion_mp_filtro_combustible   = (($tabla_de_cambios_penultima['duracion_mp_filtro_combustible']  -   $tabla_de_cambios_penultima['horometro_mp_filtro_combustible'] - $hora_filtro_petr_mp)     /$tabla_de_cambios['duracion_mp_filtro_combustible'])*100;
          $sema_duracion_mp_filtro_aceite        = (($tabla_de_cambios_penultima['duracion_mp_filtro_aceite']       -   $tabla_de_cambios_penultima['horometro_mp_filtro_aceite']      - $hora_filtro_ac_mp)       /$tabla_de_cambios['duracion_mp_filtro_aceite'])*100 ;
          $sema_duracion_mp_filtro_racor         = (($tabla_de_cambios_penultima['duracion_mp_filtro_racor']        -   $tabla_de_cambios_penultima['horometro_mp_filtro_racor']       - $hora_filtro_racor)       /$tabla_de_cambios['duracion_mp_filtro_racor'])*100;
          $sema_duracion_mp_filtro_aire          = (($tabla_de_cambios_penultima['duracion_mp_filtro_aire']         -   $tabla_de_cambios_penultima['horometro_mp_filtro_aire']        - $horas_filtro_de_aire_mp) /$tabla_de_cambios['duracion_mp_filtro_aire'])*100;
          $sema_duracion_cm_aceite               = (($tabla_de_cambios_penultima['duracion_cm_aceite']              -   $tabla_de_cambios_penultima['horometro_cm_aceite']             - $horas_aceite_cm)         /$tabla_de_cambios['duracion_cm_aceite'])*100;
          $sema_duracion_cm_filtro_aceite        = (($tabla_de_cambios_penultima['duracion_cm_filtro_aceite']       -   $tabla_de_cambios_penultima['horometro_cm_filtro_aceite']      - $hora_filtro_ac_cm)       /$tabla_de_cambios['duracion_cm_aceite'])*100;
          $sema_duracion_hy_aceite               = (($tabla_de_cambios_penultima['duracion_hy_aceite']              -   $tabla_de_cambios_penultima['horometro_hy_aceite']             - $hora_aceite_hytek)       /$tabla_de_cambios['duracion_hy_aceite'])*100;
          $sema_duracion_hy_filtro_aceite        = (($tabla_de_cambios_penultima['duracion_hy_filtro_aceite']       -   $tabla_de_cambios_penultima['horometro_hy_filtro_aceite']      - $hora_filtro_hytek)       /$tabla_de_cambios['duracion_hy_filtro_aceite'])*100;


          $sema_resultado_calculo = [
                                  'duracion_mp_aceite'              => $sema_duracion_mp_aceite,
                                  'duracion_mp_filtro_combustible'  => $sema_duracion_mp_filtro_combustible,
                                  'duracion_mp_filtro_aceite'       => $sema_duracion_mp_filtro_aceite,
                                  'duracion_mp_filtro_racor'        => $sema_duracion_mp_filtro_racor,
                                  'duracion_mp_filtro_aire'         => $sema_duracion_mp_filtro_aire,
                                  'duracion_cm_aceite'              => $sema_duracion_cm_aceite,
                                  'duracion_cm_filtro_aceite'       => $sema_duracion_cm_filtro_aceite,
                                  'duracion_hy_aceite'              => $sema_duracion_hy_aceite,
                                  'duracion_hy_filtro_aceite'       => $sema_duracion_hy_filtro_aceite
                                ];



                                    return response()->json([
                                                              'resultado_calculo' => $resultado_calculo,
                                                              'sema_resultado_calculo' => $sema_resultado_calculo,
                                                              'respuesta' => 'ok'
                                                            ]);


      }else{

        return response()->json([

                                'respuesta' => 'sindatos'
                              ]);

      }




  }







  /*
|--------------------------------------------------------------------------
| MANTENEDOR - TABLA DE PASO - BITACORA DE MAQUINA
|--------------------------------------------------------------------------
*/

public function tabla_de_cambios($id)
{


      // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }



          $tabla_de_cambios = Tabla_de_cambios::where('id_bitacora', $id)->first();

    if ($tabla_de_cambios) {
        return view('bdm_mantenedores.tabla_de_cambios', compact( 'id', 'tabla_de_cambios'));
    } else {
        return view('bdm_mantenedores.tabla_de_cambios',compact('id'));
    }


}

public function tabla_de_cambios_guardar(Request $request)
{

  try{

        // Verificar si el usuario está autenticado
        if (!auth()->check()){
          // Redireccionar al inicio de sesión u otra página según corresponda
          return redirect()->route('login');
      }

        $inputs       = $request->all();
        $id_usuario   = auth()->user()->id;
        $id_bitacora  = $inputs['id_bitacora'];


        $tabla_de_cambios = Tabla_de_cambios::where('id_bitacora', $id_bitacora)->first();

      //return $inputs['horometro_mp_aceite'];
        if ($tabla_de_cambios) {
            // Modificar la información existente
            $tabla_de_cambios->horometro_mp_aceite               = $inputs['horometro_mp_aceite'];
            $tabla_de_cambios->horometro_mp_filtro_combustible   = $inputs['horometro_mp_filtro_combustible'];
            $tabla_de_cambios->horometro_mp_filtro_aceite        = $inputs['horometro_mp_filtro_aceite'];
            $tabla_de_cambios->horometro_mp_filtro_racor         = $inputs['horometro_mp_filtro_racor'];
            $tabla_de_cambios->horometro_cm_aceite               = $inputs['horometro_cm_aceite'];
            $tabla_de_cambios->horometro_cm_filtro_aceite        = $inputs['horometro_cm_filtro_aceite'];
            $tabla_de_cambios->horometro_hy_aceite               = $inputs['horometro_hy_aceite'];
            $tabla_de_cambios->horometro_hy_filtro_aceite        = $inputs['horometro_hy_filtro_aceite'];
            $tabla_de_cambios->fecha_mp_aceite                   = $inputs['fecha_mp_aceite'];
            $tabla_de_cambios->fecha_mp_filtro_combustible       = $inputs['fecha_mp_filtro_combustible'];
            $tabla_de_cambios->fecha_mp_filtro_aceite            = $inputs['fecha_mp_filtro_aceite'];
            $tabla_de_cambios->fecha_cm_filtro_aceite            = $inputs['fecha_cm_filtro_aceite'];
            $tabla_de_cambios->fecha_mp_filtro_racor             = $inputs['fecha_mp_filtro_racor'];
            $tabla_de_cambios->horometro_mp_filtro_aire           = $inputs['horometro_mp_filtro_aire'];
            $tabla_de_cambios->duracion_mp_filtro_aire           = $inputs['duracion_mp_filtro_aire'];
            $tabla_de_cambios->fecha_mp_filtro_aire              = $inputs['fecha_mp_filtro_aire'];
            $tabla_de_cambios->fecha_cm_aceite                   = $inputs['fecha_cm_aceite'];
            $tabla_de_cambios->fecha_hy_aceite                   = $inputs['fecha_hy_aceite'];
            $tabla_de_cambios->fecha_hy_filtro_aceite            = $inputs['fecha_hy_filtro_aceite'];
            $tabla_de_cambios->duracion_mp_aceite                = $inputs['duracion_mp_aceite'];
            $tabla_de_cambios->duracion_mp_filtro_combustible    = $inputs['duracion_mp_filtro_combustible'];
            $tabla_de_cambios->duracion_mp_filtro_aceite         = $inputs['duracion_mp_filtro_aceite'];
            $tabla_de_cambios->duracion_cm_filtro_aceite         = $inputs['duracion_cm_filtro_aceite'];
            $tabla_de_cambios->duracion_mp_filtro_racor          = $inputs['duracion_mp_filtro_racor'];
            $tabla_de_cambios->duracion_cm_aceite                = $inputs['duracion_cm_aceite'];
            $tabla_de_cambios->duracion_hy_aceite                = $inputs['duracion_hy_aceite'];
            $tabla_de_cambios->duracion_hy_filtro_aceite         = $inputs['duracion_hy_filtro_aceite'];
            $tabla_de_cambios->id_usuario_m                      = $id_usuario;
            $tabla_de_cambios->save();

            return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Tabla de cambio modificada correctamente!', 'type' => 'success']);
        } else {
            // Guardar nueva información
            $tabla_de_cambios = new Tabla_de_cambios;
            $tabla_de_cambios->id_bitacora                       = $inputs['id_bitacora'];
            $tabla_de_cambios->horometro_mp_aceite               = $inputs['horometro_mp_aceite'];
            $tabla_de_cambios->horometro_mp_filtro_combustible   = $inputs['horometro_mp_filtro_combustible'];
            $tabla_de_cambios->horometro_mp_filtro_aceite        = $inputs['horometro_mp_filtro_aceite'];
            $tabla_de_cambios->horometro_mp_filtro_racor         = $inputs['horometro_mp_filtro_racor'];
            $tabla_de_cambios->horometro_cm_aceite               = $inputs['horometro_cm_aceite'];
            $tabla_de_cambios->horometro_cm_filtro_aceite        = $inputs['horometro_cm_filtro_aceite'];
            $tabla_de_cambios->horometro_hy_aceite               = $inputs['horometro_hy_aceite'];
            $tabla_de_cambios->horometro_hy_filtro_aceite        = $inputs['horometro_hy_filtro_aceite'];
            $tabla_de_cambios->fecha_mp_aceite                   = $inputs['fecha_mp_aceite'];
            $tabla_de_cambios->fecha_mp_filtro_combustible       = $inputs['fecha_mp_filtro_combustible'];
            $tabla_de_cambios->fecha_mp_filtro_aceite            = $inputs['fecha_mp_filtro_aceite'];
            $tabla_de_cambios->fecha_cm_filtro_aceite            = $inputs['fecha_cm_filtro_aceite'];
            $tabla_de_cambios->fecha_mp_filtro_racor             = $inputs['fecha_mp_filtro_racor'];
            $tabla_de_cambios->horometro_mp_filtro_aire          = $inputs['horometro_mp_filtro_aire'];
            $tabla_de_cambios->fecha_mp_filtro_aire              = $inputs['fecha_mp_filtro_aire'];

            $tabla_de_cambios->duracion_mp_filtro_aire           = $inputs['duracion_mp_filtro_aire'];
            $tabla_de_cambios->fecha_cm_aceite                   = $inputs['fecha_cm_aceite'];
            $tabla_de_cambios->fecha_hy_aceite                   = $inputs['fecha_hy_aceite'];
            $tabla_de_cambios->fecha_hy_filtro_aceite            = $inputs['fecha_hy_filtro_aceite'];
            $tabla_de_cambios->duracion_mp_aceite                = $inputs['duracion_mp_aceite'];
            $tabla_de_cambios->duracion_mp_filtro_combustible    = $inputs['duracion_mp_filtro_combustible'];
            $tabla_de_cambios->duracion_mp_filtro_aceite         = $inputs['duracion_mp_filtro_aceite'];
            $tabla_de_cambios->duracion_cm_filtro_aceite         = $inputs['duracion_cm_filtro_aceite'];
            $tabla_de_cambios->duracion_mp_filtro_racor          = $inputs['duracion_mp_filtro_racor'];
            $tabla_de_cambios->duracion_cm_aceite                = $inputs['duracion_cm_aceite'];
            $tabla_de_cambios->duracion_hy_aceite                = $inputs['duracion_hy_aceite'];
            $tabla_de_cambios->duracion_hy_filtro_aceite         = $inputs['duracion_hy_filtro_aceite'];
            $tabla_de_cambios->id_usuario_c                      = $id_usuario;
            $tabla_de_cambios->estado                            = 1; // Habilitado
            $tabla_de_cambios->save();

            return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Tabla de cambio guardada correctamente!', 'type' => 'success']);
        }


    } catch (\Exception $e) {
      return redirect()->back()->with([
          'alert' => 'Error!',
          'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
          'type' => 'error'
      ]);
  }

}






/*
|--------------------------------------------------------------------------
| MANTENEDOR - CONTRO DE INSUMOS - BITACORA DE MAQUINA
|--------------------------------------------------------------------------
*/

public function controldeinsumos_c($id)
{



        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
          // Redireccionar al inicio de sesión u otra página según corresponda
          return redirect()->route('login');
      }

    $control_de_insumo = Control_de_insumo::where('id_bitacora', $id)->first();

    if ($control_de_insumo) {
        return view('bdm_mantenedores.control_de_insumos', compact( 'id', 'control_de_insumo'));
    } else {
        return view('bdm_mantenedores.control_de_insumos',compact('id'));
    }
}


public function controldeinsumo_guardar(Request $request)
{

  try{

                // Verificar si el usuario está autenticado
                if (!auth()->check()) {
                  // Redireccionar al inicio de sesión u otra página según corresponda
                  return redirect()->route('login');
              }

            $inputs = $request->all();
            $id_usuario = auth()->user()->id;
            $id_bitacora = $inputs['id_bitacora'];

            $control_de_insumo = Control_de_insumo::where('id_bitacora', $id_bitacora)->first();

            if ($control_de_insumo) {
                // Modificar la información existente
                $control_de_insumo->petro_stock_zar             = $inputs['petro_stock_zar'];
                $control_de_insumo->petro_stock_rec             = $inputs['petro_stock_rec'];
                $control_de_insumo->petro_pedido_lts            = $inputs['petro_pedido_lts'];
                $control_de_insumo->petro_guia                  = $inputs['petro_guia'];
                $control_de_insumo->petro_consumo               = $inputs['petro_consumo'];
                $control_de_insumo->aceitemotor_stock_zar       = $inputs['aceitemotor_stock_zar'];
                $control_de_insumo->aceite_motor_stock_rec      = $inputs['aceite_motor_stock_rec'];
                $control_de_insumo->aceite_motor_pedido_lts     = $inputs['aceite_motor_pedido_lts'];
                $control_de_insumo->aceite_motor_guia           = $inputs['aceite_motor_guia'];
                $control_de_insumo->aceite_motor_consumo        = $inputs['aceite_motor_consumo'];
                $control_de_insumo->aceite_hid_stock_zar        = $inputs['aceite_hid_stock_zar'];
                $control_de_insumo->aceite_hid_stock_rec        = $inputs['aceite_hid_stock_rec'];
                $control_de_insumo->aceite_hid_stock_pedido_lts = $inputs['aceite_hid_stock_pedido_lts'];
                $control_de_insumo->aceite_hid_guia             = $inputs['aceite_hid_guia'];
                $control_de_insumo->aceite_hid_consumo          = $inputs['aceite_hid_consumo'];
                $control_de_insumo->grasa_stock_zar             = $inputs['grasa_stock_zar'];
                $control_de_insumo->grasa_stock_rec             = $inputs['grasa_stock_rec'];
                $control_de_insumo->grasa_pedido                = $inputs['grasa_pedido'];
                $control_de_insumo->grasa_guia                  = $inputs['grasa_guia'];
                $control_de_insumo->grasa_consumo               = $inputs['grasa_consumo'];
                $control_de_insumo->id_usuario_m                = $id_usuario;

                $control_de_insumo->save();

                return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Control de Insumos modificado correctamente!', 'type' => 'success']);
            } else {
                // Guardar nueva información
                $control_de_insumo = new Control_de_insumo;
                $control_de_insumo->id_bitacora = $inputs['id_bitacora'];

                $control_de_insumo->petro_stock_zar             = $inputs['petro_stock_zar'];
                $control_de_insumo->petro_stock_rec             = $inputs['petro_stock_rec'];
                $control_de_insumo->petro_pedido_lts            = $inputs['petro_pedido_lts'];
                $control_de_insumo->petro_guia                  = $inputs['petro_guia'];
                $control_de_insumo->petro_consumo               = $inputs['petro_consumo'];
                $control_de_insumo->aceitemotor_stock_zar       = $inputs['aceitemotor_stock_zar'];
                $control_de_insumo->aceite_motor_stock_rec      = $inputs['aceite_motor_stock_rec'];
                $control_de_insumo->aceite_motor_pedido_lts     = $inputs['aceite_motor_pedido_lts'];
                $control_de_insumo->aceite_motor_guia           = $inputs['aceite_motor_guia'];
                $control_de_insumo->aceite_motor_consumo        = $inputs['aceite_motor_consumo'];
                $control_de_insumo->aceite_hid_stock_zar        = $inputs['aceite_hid_stock_zar'];
                $control_de_insumo->aceite_hid_stock_rec        = $inputs['aceite_hid_stock_rec'];
                $control_de_insumo->aceite_hid_stock_pedido_lts = $inputs['aceite_hid_stock_pedido_lts'];
                $control_de_insumo->aceite_hid_guia             = $inputs['aceite_hid_guia'];
                $control_de_insumo->aceite_hid_consumo          = $inputs['aceite_hid_consumo'];
                $control_de_insumo->grasa_stock_zar             = $inputs['grasa_stock_zar'];
                $control_de_insumo->grasa_stock_rec             = $inputs['grasa_stock_rec'];
                $control_de_insumo->grasa_pedido                = $inputs['grasa_pedido'];
                $control_de_insumo->grasa_guia                  = $inputs['grasa_guia'];
                $control_de_insumo->grasa_consumo               = $inputs['grasa_consumo'];
                $control_de_insumo->id_usuario_c                = $id_usuario;
                $control_de_insumo->estado                      = 1; // Habilitado
                $control_de_insumo->save();

                return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Control de Insumos guardado correctamente!', 'type' => 'success']);
            }

        } catch (\Exception $e) {
          return redirect()->back()->with([
              'alert' => 'Error!',
              'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
              'type' => 'error'
          ]);
      }

}


/*
|--------------------------------------------------------------------------
| MANTENEDOR - CONTRO DE INSUMOS - BITACORA DE MAQUINA
|--------------------------------------------------------------------------
*/




public function motorprincipalycm($id)
{
      // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }


    $tabla_de_cambios     = Tabla_de_cambios::where('id_bitacora', $id)->first();
    $motor_principal_y_cm = Motor_principal_y_cm::where('id_bitacora', $id)->first();


    $folio = Folios::where('id_bitacora', $id)->first();

    //si el folio es el numero 1 no podra ingresar datos el motorista, lo podra hacer en la bitacora siguiente (bitacora 2)
    if ($folio->folio == 1 && !isset($tabla_de_cambios)) {
            return redirect()->back()->with([
              'alert' => 'Error!',
              'message' => 'Lo siento, el administrador aun no completa los datos de la tabla de cambios, por lo tanto no podrá seguir avanzando, contacte al administrador para que complete los valores',
              'type' => 'error'
          ]);

    }else{

      return view('bdm_mantenedores.motorprincipalycm',compact('id'));
    }


}





public function motor_principal_y_cm_guardar(Request $request){

  try{
                // Verificar si el usuario está autenticado
                if (!auth()->check()) {
                  // Redireccionar al inicio de sesión u otra página según corresponda
                  return redirect()->route('login');
              }

            $inputs         = $request->all();
            $id_usuario     = auth()->user()->id;
            $id_bitacora    = $inputs['id_bitacora'];



            $motor_principal_y_cm = Motor_principal_y_cm::where('id_bitacora', $id_bitacora)->first();

            if ($motor_principal_y_cm) {
                // Modificar la información existente

                $motor_principal_y_cm->horas_aceite_mp                =  $inputs['horas_aceite_mp'];
                $motor_principal_y_cm->hora_filtro_ac_mp              =  $inputs['hora_filtro_ac_mp'];
                $motor_principal_y_cm->hora_filtro_petr_mp            =  $inputs['hora_filtro_petr_mp'];
                $motor_principal_y_cm->hora_filtro_racor              =  $inputs['hora_filtro_racor'];
                $motor_principal_y_cm->horas_aceite_cm                =  $inputs['horas_aceite_cm'];
                $motor_principal_y_cm->hora_filtro_ac_cm              =  $inputs['hora_filtro_ac_cm'];
                $motor_principal_y_cm->horasmotor_principal_zarpe     =  $inputs['horasmotor_principal_zarpe'];
                $motor_principal_y_cm->horasmotor_principal_recalada  =  $inputs['horasmotor_principal_recalada'];
                $motor_principal_y_cm->horas_contra_marcha            =  $inputs['horas_contra_marcha'];
                $motor_principal_y_cm->hora_aceite_hytek              =  $inputs['hora_aceite_hytek'];
                $motor_principal_y_cm->horas_filtro_de_aire_mp        =  $inputs['horas_filtro_de_aire_mp'];
                $motor_principal_y_cm->hora_filtro_hytek              =  $inputs['hora_filtro_hytek'];
                $motor_principal_y_cm->hora_de_hytek                  =  $inputs['hora_de_hytek'];

                $motor_principal_y_cm->duracion_mp_aceite               =  $inputs['duracion_mp_aceite'];
                $motor_principal_y_cm->duracion_mp_filtro_aceite        =  $inputs['duracion_mp_filtro_aceite'];
                $motor_principal_y_cm->duracion_mp_filtro_combustible   =  $inputs['duracion_mp_filtro_combustible'];
                $motor_principal_y_cm->duracion_mp_filtro_racor         =  $inputs['duracion_mp_filtro_racor'];
                $motor_principal_y_cm->duracion_cm_aceite               =  $inputs['duracion_cm_aceite'];
                $motor_principal_y_cm->duracion_cm_filtro_aceite        =  $inputs['duracion_cm_filtro_aceite'];
                $motor_principal_y_cm->duracion_hy_aceite               =  $inputs['duracion_hy_aceite'];
                $motor_principal_y_cm->duracion_hy_filtro_aceite        =  $inputs['duracion_hy_filtro_aceite'];
                $motor_principal_y_cm->duracion_mp_filtro_aire          =  $inputs['duracion_mp_filtro_aire'];

                $motor_principal_y_cm->id_usuario_m                   =  $id_usuario;
                $motor_principal_y_cm->estado                         =  1;//hablitadop
                $motor_principal_y_cm->save();
                return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Motor Principal y CM, modificado correctamente!', 'type' => 'success']);
              } else {
                // Guardar nueva información
                $motor_principal_y_cm=new Motor_principal_y_cm;
                $motor_principal_y_cm->id_bitacora     = $inputs['id_bitacora'];

                $motor_principal_y_cm->horas_aceite_mp                =  $inputs['horas_aceite_mp'];
                $motor_principal_y_cm->hora_filtro_ac_mp              =  $inputs['hora_filtro_ac_mp'];
                $motor_principal_y_cm->hora_filtro_petr_mp            =  $inputs['hora_filtro_petr_mp'];
                $motor_principal_y_cm->hora_filtro_racor              =  $inputs['hora_filtro_racor'];
                $motor_principal_y_cm->horas_aceite_cm                =  $inputs['horas_aceite_cm'];
                $motor_principal_y_cm->hora_filtro_ac_cm              =  $inputs['hora_filtro_ac_cm'];
                $motor_principal_y_cm->horasmotor_principal_zarpe     =  $inputs['horasmotor_principal_zarpe'];
                $motor_principal_y_cm->horasmotor_principal_recalada  =  $inputs['horasmotor_principal_recalada'];
                $motor_principal_y_cm->horas_contra_marcha            =  $inputs['horas_contra_marcha'];
                $motor_principal_y_cm->hora_aceite_hytek              =  $inputs['hora_aceite_hytek'];
                $motor_principal_y_cm->horas_filtro_de_aire_mp        =  $inputs['horas_filtro_de_aire_mp'];
                $motor_principal_y_cm->hora_filtro_hytek              =  $inputs['hora_filtro_hytek'];
                $motor_principal_y_cm->hora_de_hytek                  =  $inputs['hora_de_hytek'];

                $motor_principal_y_cm->duracion_mp_aceite               =  $inputs['duracion_mp_aceite'];
                $motor_principal_y_cm->duracion_mp_filtro_aceite        =  $inputs['duracion_mp_filtro_aceite'];
                $motor_principal_y_cm->duracion_mp_filtro_combustible   =  $inputs['duracion_mp_filtro_combustible'];
                $motor_principal_y_cm->duracion_mp_filtro_racor         =  $inputs['duracion_mp_filtro_racor'];
                $motor_principal_y_cm->duracion_cm_aceite               =  $inputs['duracion_cm_aceite'];
                $motor_principal_y_cm->duracion_cm_filtro_aceite        =  $inputs['duracion_cm_filtro_aceite'];
                $motor_principal_y_cm->duracion_hy_aceite               =  $inputs['duracion_hy_aceite'];
                $motor_principal_y_cm->duracion_hy_filtro_aceite        =  $inputs['duracion_hy_filtro_aceite'];
                $motor_principal_y_cm->duracion_mp_filtro_aire          =  $inputs['duracion_mp_filtro_aire'];

                $motor_principal_y_cm->id_usuario_c                   =  $id_usuario;
                $motor_principal_y_cm->estado                         =  1;//hablitadop
                $motor_principal_y_cm->save();
                return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Motor Principal y CM, guardado correctamente!', 'type' => 'success']);
                }

      } catch (\Exception $e) {
        return redirect()->back()->with([
            'alert' => 'Error!',
            'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
            'type' => 'error'
        ]);
    }

}




/*
|--------------------------------------------------------------------------
| MANTENEDOR - TABLA DE CAMBIO MOTOR AUX - BITACORA DE MAQUINA
|--------------------------------------------------------------------------
*/

public function tablacambio_motoresaux($id,$i)
{
      // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }

    $tablacambio_motoresaux =Tablacambio_motoresaux::where('id_bitacora', $id)->where('numero_motor_aux', $i)->first();


  if ($tablacambio_motoresaux){
      return view('bdm_mantenedores.tabla_de_cambio_motoresaux', compact( 'id', 'tablacambio_motoresaux','i'));
  } else {
     // return view('bdm_mantenedores.resources/views/bdm_mantenedores/tabla_de_cambio_motoresaux.blade.php',compact('id','i'));
      return view('bdm_mantenedores.tabla_de_cambio_motoresaux',compact('id','i'));
  }


}



public function tablacambio_motores_aux_guardar(Request $request)
{

  try{
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
          // Redireccionar al inicio de sesión u otra página según corresponda
          return redirect()->route('login');
      }


        $inputs             = $request->all();
        $id_usuario         = auth()->user()->id;
        $id_bitacora        = $inputs['id_bitacora'];
        $numero_motor_aux   = $inputs['numero_motor_aux'];


      $tablacambio_motoresaux = Tablacambio_motoresaux::where('id_bitacora', $id_bitacora)->where('numero_motor_aux', $numero_motor_aux)->first();

      if ($tablacambio_motoresaux) {
          // Modificar la información existente


          $tablacambio_motoresaux->horometro_Aceite              =  $inputs['horometro_Aceite'];
          $tablacambio_motoresaux->horometro_filtro_aceite       =  $inputs['horometro_filtro_aceite'];
          $tablacambio_motoresaux->horometro_fitro_combustible   =  $inputs['horometro_fitro_combustible'];
          $tablacambio_motoresaux->horometro_filtro_racor        =  $inputs['horometro_filtro_racor'];
          $tablacambio_motoresaux->horometro_filtro_aire         =  $inputs['horometro_filtro_aire'];
          $tablacambio_motoresaux->fecha_aceite                  =  $inputs['fecha_aceite'];
          $tablacambio_motoresaux->fecha_filtro_aceite           =  $inputs['fecha_filtro_aceite'];
          $tablacambio_motoresaux->fecha_fitro_conbustible       =  $inputs['fecha_fitro_conbustible'];
          $tablacambio_motoresaux->fecha_filtro_racor            =  $inputs['fecha_filtro_racor'];
          $tablacambio_motoresaux->fecha_filtro_aire             =  $inputs['fecha_filtro_aire'];

          $tablacambio_motoresaux->duracion_aceite               =  $inputs['duracion_aceite'];
          $tablacambio_motoresaux->duracion_filtro_aceite        =  $inputs['duracion_filtro_aceite'];
          $tablacambio_motoresaux->duracion_filtro_combustible   =  $inputs['duracion_filtro_combustible'];
          $tablacambio_motoresaux->duracion_filtro_racor         =  $inputs['duracion_filtro_racor'];
          $tablacambio_motoresaux->duracion_filtro_aire          =  $inputs['duracion_filtro_aire'];
          $tablacambio_motoresaux->id_usuario_m                  =  $id_usuario;
          $tablacambio_motoresaux->estado                        =  1;//hablitadop
          $tablacambio_motoresaux->save();

          return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Motores_aux, modificado correctamente!', 'type' => 'success']);
        } else {



           // Guardar nueva información
           $tablacambio_motoresaux=new Tablacambio_motoresaux;
           $tablacambio_motoresaux->id_bitacora                   = $inputs['id_bitacora'];

           $tablacambio_motoresaux->numero_motor_aux              =  $inputs['numero_motor_aux']; //1poeq
           $tablacambio_motoresaux->horometro_Aceite              =  $inputs['horometro_Aceite'];
           $tablacambio_motoresaux->horometro_filtro_aceite       =  $inputs['horometro_filtro_aceite'];
           $tablacambio_motoresaux->horometro_fitro_combustible   =  $inputs['horometro_fitro_combustible'];
           $tablacambio_motoresaux->horometro_filtro_racor        =  $inputs['horometro_filtro_racor'];
           $tablacambio_motoresaux->horometro_filtro_aire         =  $inputs['horometro_filtro_aire'];
           $tablacambio_motoresaux->fecha_aceite                  =  $inputs['fecha_aceite'];
           $tablacambio_motoresaux->fecha_filtro_aceite           =  $inputs['fecha_filtro_aceite'];
           $tablacambio_motoresaux->fecha_fitro_conbustible       =  $inputs['fecha_fitro_conbustible'];
           $tablacambio_motoresaux->fecha_filtro_racor            =  $inputs['fecha_filtro_racor'];
           $tablacambio_motoresaux->fecha_filtro_aire             =  $inputs['fecha_filtro_aire'];
           $tablacambio_motoresaux->duracion_aceite               =  $inputs['duracion_aceite'];
           $tablacambio_motoresaux->duracion_filtro_aceite        =  $inputs['duracion_filtro_aceite'];
           $tablacambio_motoresaux->duracion_filtro_combustible   =  $inputs['duracion_filtro_combustible'];
           $tablacambio_motoresaux->duracion_filtro_racor         =  $inputs['duracion_filtro_racor'];
           $tablacambio_motoresaux->duracion_filtro_aire          =  $inputs['duracion_filtro_aire'];

           $tablacambio_motoresaux->id_usuario_c                  =  $id_usuario;
           $tablacambio_motoresaux->estado                        =  1;//hablitadop
           $tablacambio_motoresaux->save();

           return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'tabla de cambio de motor auxiliares, guardado correctamente!', 'type' => 'success']);
          }

    } catch (\Exception $e) {
      return redirect()->back()->with([
          'alert' => 'Error!',
          'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
          'type' => 'error'
      ]);
  }
}




/*
|--------------------------------------------------------------------------
| MANTENEDOR - MOTOR AUX - BITACORA DE MAQUINA
|--------------------------------------------------------------------------
*/

public function motoresaux($id,$i)
{
      // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }

    $motores_aux = Motores_auxiliares::where('id_bitacora', $id)->where('numero_motor_aux', $i)->first();


  if ($motores_aux){
      return view('bdm_mantenedores.motoresaux', compact( 'id', 'motores_aux','i'));
  } else {
      return view('bdm_mantenedores.motoresaux',compact('id','i'));
  }


}

public function motores_aux_guardar(Request $request)
{

  try{
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
          // Redireccionar al inicio de sesión u otra página según corresponda
          return redirect()->route('login');
      }


        $inputs               = $request->all();
        $id_usuario           = auth()->user()->id;
        $id_bitacora          = $inputs['id_bitacora'];
        $numero_motor_aux     = $inputs['numero_motor_aux'];

      $motores_aux = Motores_auxiliares::where('id_bitacora', $id_bitacora)->where('numero_motor_aux', $numero_motor_aux)->first();

      if ($motores_aux) {
          // Modificar la información existente


          $motores_aux->horas_ma_zarpe                =  $inputs['horas_ma_zarpe'];
          $motores_aux->horas_ma_recalada             =  $inputs['horas_ma_recalada'];
          $motores_aux->horas_aceite                  =  $inputs['horas_aceite'];
          $motores_aux->hora_filtro_aceite            =  $inputs['hora_filtro_aceite'];
          $motores_aux->hora_filtro_combustible       =  $inputs['hora_filtro_combustible'];
          $motores_aux->hora_filtro_racor             =  $inputs['hora_filtro_racor'];
          $motores_aux->hora_filtro_aire              =  $inputs['hora_filtro_aire'];
          $motores_aux->duracion_aceite               =  $inputs['duracion_aceite'];
          $motores_aux->duracion_filtro_aceite        =  $inputs['duracion_filtro_aceite'];
          $motores_aux->duracion_filtro_combustible   =  $inputs['duracion_filtro_combustible'];
          $motores_aux->duracion_filtro_racor         =  $inputs['duracion_filtro_racor'];
          $motores_aux->duracion_filtro_aire          =  $inputs['duracion_filtro_aire'];


          $motores_aux->id_usuario_m                  =  $id_usuario;
          $motores_aux->estado                        =  1;//hablitadop
          $motores_aux->save();



          return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Motores_aux, modificado correctamente!', 'type' => 'success']);
        } else {
           // Guardar nueva información
           $motores_aux=new Motores_auxiliares;
           $motores_aux->id_bitacora                   = $inputs['id_bitacora'];

           $motores_aux->numero_motor_aux              =  $inputs['numero_motor_aux']; //1poeq
           $motores_aux->horas_ma_zarpe                =  $inputs['horas_ma_zarpe'];
           $motores_aux->horas_ma_recalada             =  $inputs['horas_ma_recalada'];
           $motores_aux->horas_aceite                  =  $inputs['horas_aceite'];
           $motores_aux->hora_filtro_aceite            =  $inputs['hora_filtro_aceite'];
           $motores_aux->hora_filtro_combustible       =  $inputs['hora_filtro_combustible'];
           $motores_aux->hora_filtro_racor             =  $inputs['hora_filtro_racor'];
           $motores_aux->hora_filtro_aire              =  $inputs['hora_filtro_aire'];
           $motores_aux->duracion_aceite               =  $inputs['duracion_aceite'];
           $motores_aux->duracion_filtro_aceite        =  $inputs['duracion_filtro_aceite'];
           $motores_aux->duracion_filtro_combustible   =  $inputs['duracion_filtro_combustible'];
           $motores_aux->duracion_filtro_racor         =  $inputs['duracion_filtro_racor'];
           $motores_aux->duracion_filtro_aire          =  $inputs['duracion_filtro_aire'];

           $motores_aux->id_usuario_c                  =  $id_usuario;
           $motores_aux->estado                        =  1;//hablitadop
           $motores_aux->save();

           return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Motor Auxiliar, guardado correctamente!', 'type' => 'success']);
          }

    } catch (\Exception $e) {
      return redirect()->back()->with([
          'alert' => 'Error!',
          'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
          'type' => 'error'
      ]);
  }
}




/*
|--------------------------------------------------------------------------
| MANTENEDOR - MOTOR PRINCIAL - BITACORA DE MAQUINA
|--------------------------------------------------------------------------
*/


    public function motorprincipal($id)
    {

            // Verificar si el usuario está autenticado
            if (!auth()->check()) {
              // Redireccionar al inicio de sesión u otra página según corresponda
              return redirect()->route('login');
          }


      $motor_principal = Motor_principal::where('id_bitacora', $id)->first();
      $niveles_de_aceite= Niveles_de_aceite::all();
      //return $niveles_de_aceite;




      if ($motor_principal){
          return view('bdm_mantenedores.motorprincipal', compact( 'id', 'motor_principal','niveles_de_aceite'));
      }else{
          return view('bdm_mantenedores.motorprincipal',compact('id','niveles_de_aceite'));
      }
    }





  public function motorprincipal_guardar(Request $request){

            try{
                        // Verificar si el usuario está autenticado
                if (!auth()->check()) {
                  // Redireccionar al inicio de sesión u otra página según corresponda
                  return redirect()->route('login');
              }


                  $inputs         = $request->all();
                  $id_usuario     = auth()->user()->id;
                  $id_bitacora    = $inputs['id_bitacora'];

                  $motor_principal = Motor_principal::where('id_bitacora', $id_bitacora)->first();

                  if ($motor_principal){
                      // Modificar la información existente
                      $motor_principal->rpm_0004                          =  $inputs['rpm_0004'];
                      $motor_principal->naceite_0004                      =  $inputs['naceite_0004'];
                      $motor_principal->relleno_0004                      =  $inputs['relleno_0004'];
                      $motor_principal->presion_aceite_0004               =  $inputs['presion_aceite_0004'];
                      $motor_principal->temperatura_aceite_0004           =  $inputs['temperatura_aceite_0004'];
                      $motor_principal->voltaje_bateria_0004              =  $inputs['voltaje_bateria_0004'];
                      $motor_principal->temperatura_escape_babor_0004     =  $inputs['temperatura_escape_babor_0004'];
                      $motor_principal->temperatura_escape_estribor_0004  =  $inputs['temperatura_escape_estribor_0004'];
                      $motor_principal->temperatura_admision_general_0004 =  $inputs['temperatura_admision_general_0004'];
                      $motor_principal->presion_aire_0004                 =  $inputs['presion_aire_0004'];
                      $motor_principal->presion_agua_0004                 =  $inputs['presion_agua_0004'];
                      $motor_principal->presion_combustible_0004          =  $inputs['presion_combustible_0004'];
                      $motor_principal->rpm_0408                          =  $inputs['rpm_0408'];
                      $motor_principal->naceite_0408                      =  $inputs['naceite_0408'];
                      $motor_principal->relleno_0408                      =  $inputs['relleno_0408'];
                      $motor_principal->presion_aceite_0408               =  $inputs['presion_aceite_0408'];
                      $motor_principal->temperatura_aceite_0408           =  $inputs['temperatura_aceite_0408'];
                      $motor_principal->voltaje_bateria_0408              =  $inputs['voltaje_bateria_0408'];
                      $motor_principal->temperatura_escape_babor_0408     =  $inputs['temperatura_escape_babor_0408'];
                      $motor_principal->temperatura_escape_estribor_0408  =  $inputs['temperatura_escape_estribor_0408'];
                      $motor_principal->temperatura_admision_general_0408 =  $inputs['temperatura_admision_general_0408'];
                      $motor_principal->presion_aire_0408                 =  $inputs['presion_aire_0408'];
                      $motor_principal->presion_agua_0408                 =  $inputs['presion_agua_0408'];
                      $motor_principal->presion_combustible_0408          =  $inputs['presion_combustible_0408'];

                      $motor_principal->rpm_0812                          =  $inputs['rpm_0812'];
                      $motor_principal->naceite_0812                      =  $inputs['naceite_0812'];
                      $motor_principal->relleno_0812                      =  $inputs['relleno_0812'];
                      $motor_principal->presion_aceite_0812               =  $inputs['presion_aceite_0812'];
                      $motor_principal->temperatura_aceite_0812           =  $inputs['temperatura_aceite_0812'];
                      $motor_principal->voltaje_bateria_0812              =  $inputs['voltaje_bateria_0812'];
                      $motor_principal->temperatura_escape_babor_0812     =  $inputs['temperatura_escape_babor_0812'];
                      $motor_principal->temperatura_escape_estribor_0812  =  $inputs['temperatura_escape_estribor_0812'];
                      $motor_principal->temperatura_admision_general_0812 =  $inputs['temperatura_admision_general_0812'];
                      $motor_principal->presion_aire_0812                 =  $inputs['presion_aire_0812'];
                      $motor_principal->presion_agua_0812                 =  $inputs['presion_agua_0812'];
                      $motor_principal->presion_combustible_0812          =  $inputs['presion_combustible_0812'];

                      $motor_principal->rpm_1216                          =  $inputs['rpm_1216'];
                      $motor_principal->naceite_1216                      =  $inputs['naceite_1216'];
                      $motor_principal->relleno_1216                      =  $inputs['relleno_1216'];
                      $motor_principal->presion_aceite_1216               =  $inputs['presion_aceite_1216'];
                      $motor_principal->temperatura_aceite_1216           =  $inputs['temperatura_aceite_1216'];
                      $motor_principal->voltaje_bateria_1216              =  $inputs['voltaje_bateria_1216'];
                      $motor_principal->temperatura_escape_babor_1216     =  $inputs['temperatura_escape_babor_1216'];
                      $motor_principal->temperatura_escape_estribor_1216  =  $inputs['temperatura_escape_estribor_1216'];
                      $motor_principal->temperatura_admision_general_1216 =  $inputs['temperatura_admision_general_1216'];
                      $motor_principal->presion_aire_1216                 =  $inputs['presion_aire_1216'];
                      $motor_principal->presion_agua_1216                 =  $inputs['presion_agua_1216'];
                      $motor_principal->presion_combustible_1216          =  $inputs['presion_combustible_1216'];

                      $motor_principal->rpm_1620                          =  $inputs['rpm_1620'];
                      $motor_principal->naceite_1620                      =  $inputs['naceite_1620'];
                      $motor_principal->relleno_1620                      =  $inputs['relleno_1620'];
                      $motor_principal->presion_aceite_1620               =  $inputs['presion_aceite_1620'];
                      $motor_principal->temperatura_aceite_1620           =  $inputs['temperatura_aceite_1620'];
                      $motor_principal->voltaje_bateria_1620              =  $inputs['voltaje_bateria_1620'];
                      $motor_principal->temperatura_escape_babor_1620     =  $inputs['temperatura_escape_babor_1620'];
                      $motor_principal->temperatura_escape_estribor_1620  =  $inputs['temperatura_escape_estribor_1620'];
                      $motor_principal->temperatura_admision_general_1620 =  $inputs['temperatura_admision_general_1620'];
                      $motor_principal->presion_aire_1620                 =  $inputs['presion_aire_1620'];
                      $motor_principal->presion_agua_1620                 =  $inputs['presion_agua_1620'];
                      $motor_principal->presion_combustible_1620          =  $inputs['presion_combustible_1620'];

                      $motor_principal->rpm_2024                          =  $inputs['rpm_2024'];
                      $motor_principal->naceite_2024                      =  $inputs['naceite_2024'];
                      $motor_principal->relleno_2024                      =  $inputs['relleno_2024'];
                      $motor_principal->presion_aceite_2024               =  $inputs['presion_aceite_2024'];
                      $motor_principal->temperatura_aceite_2024           =  $inputs['temperatura_aceite_2024'];
                      $motor_principal->voltaje_bateria_2024              =  $inputs['voltaje_bateria_2024'];
                      $motor_principal->temperatura_escape_babor_2024     =  $inputs['temperatura_escape_babor_2024'];
                      $motor_principal->temperatura_escape_estribor_2024  =  $inputs['temperatura_escape_estribor_2024'];
                      $motor_principal->temperatura_admision_general_2024 =  $inputs['temperatura_admision_general_2024'];
                      $motor_principal->presion_aire_2024                 =  $inputs['presion_aire_2024'];
                      $motor_principal->presion_agua_2024                 =  $inputs['presion_agua_2024'];
                      $motor_principal->presion_combustible_2024          =  $inputs['presion_combustible_2024'];



                      $motor_principal->id_usuario_m      =  $id_usuario;
                      $motor_principal->estado            =  1;//1 = activo
                      $motor_principal->save();

                      return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Motor Principal, modificado correctamente!', 'type' => 'success']);
                    }else{
                      // Guardar nueva información

                      $motor_principal=new Motor_principal;
                      $motor_principal->id_bitacora                     =  $inputs['id_bitacora'];
                      $motor_principal->rpm_0004                          =  $inputs['rpm_0004'];
                      $motor_principal->naceite_0004                      =  $inputs['naceite_0004'];
                      $motor_principal->relleno_0004                      =  $inputs['relleno_0004'];
                      $motor_principal->presion_aceite_0004               =  $inputs['presion_aceite_0004'];
                      $motor_principal->temperatura_aceite_0004           =  $inputs['temperatura_aceite_0004'];
                      $motor_principal->voltaje_bateria_0004              =  $inputs['voltaje_bateria_0004'];
                      $motor_principal->temperatura_escape_babor_0004     =  $inputs['temperatura_escape_babor_0004'];
                      $motor_principal->temperatura_escape_estribor_0004  =  $inputs['temperatura_escape_estribor_0004'];
                      $motor_principal->temperatura_admision_general_0004 =  $inputs['temperatura_admision_general_0004'];
                      $motor_principal->presion_aire_0004                 =  $inputs['presion_aire_0004'];
                      $motor_principal->presion_agua_0004                 =  $inputs['presion_agua_0004'];
                      $motor_principal->presion_combustible_0004          =  $inputs['presion_combustible_0004'];
                      $motor_principal->rpm_0408                          =  $inputs['rpm_0408'];
                      $motor_principal->naceite_0408                      =  $inputs['naceite_0408'];
                      $motor_principal->relleno_0408                      =  $inputs['relleno_0408'];
                      $motor_principal->presion_aceite_0408               =  $inputs['presion_aceite_0408'];
                      $motor_principal->temperatura_aceite_0408           =  $inputs['temperatura_aceite_0408'];
                      $motor_principal->voltaje_bateria_0408              =  $inputs['voltaje_bateria_0408'];
                      $motor_principal->temperatura_escape_babor_0408     =  $inputs['temperatura_escape_babor_0408'];
                      $motor_principal->temperatura_escape_estribor_0408  =  $inputs['temperatura_escape_estribor_0408'];
                      $motor_principal->temperatura_admision_general_0408 =  $inputs['temperatura_admision_general_0408'];
                      $motor_principal->presion_aire_0408                 =  $inputs['presion_aire_0408'];
                      $motor_principal->presion_agua_0408                 =  $inputs['presion_agua_0408'];
                      $motor_principal->presion_combustible_0408          =  $inputs['presion_combustible_0408'];

                      $motor_principal->rpm_0812                          =  $inputs['rpm_0812'];
                      $motor_principal->naceite_0812                      =  $inputs['naceite_0812'];
                      $motor_principal->relleno_0812                      =  $inputs['relleno_0812'];
                      $motor_principal->presion_aceite_0812               =  $inputs['presion_aceite_0812'];
                      $motor_principal->temperatura_aceite_0812           =  $inputs['temperatura_aceite_0812'];
                      $motor_principal->voltaje_bateria_0812              =  $inputs['voltaje_bateria_0812'];
                      $motor_principal->temperatura_escape_babor_0812     =  $inputs['temperatura_escape_babor_0812'];
                      $motor_principal->temperatura_escape_estribor_0812  =  $inputs['temperatura_escape_estribor_0812'];
                      $motor_principal->temperatura_admision_general_0812 =  $inputs['temperatura_admision_general_0812'];
                      $motor_principal->presion_aire_0812                 =  $inputs['presion_aire_0812'];
                      $motor_principal->presion_agua_0812                 =  $inputs['presion_agua_0812'];
                      $motor_principal->presion_combustible_0812          =  $inputs['presion_combustible_0812'];

                      $motor_principal->rpm_1216                          =  $inputs['rpm_1216'];
                      $motor_principal->naceite_1216                      =  $inputs['naceite_1216'];
                      $motor_principal->relleno_1216                      =  $inputs['relleno_1216'];
                      $motor_principal->presion_aceite_1216               =  $inputs['presion_aceite_1216'];
                      $motor_principal->temperatura_aceite_1216           =  $inputs['temperatura_aceite_1216'];
                      $motor_principal->voltaje_bateria_1216              =  $inputs['voltaje_bateria_1216'];
                      $motor_principal->temperatura_escape_babor_1216     =  $inputs['temperatura_escape_babor_1216'];
                      $motor_principal->temperatura_escape_estribor_1216  =  $inputs['temperatura_escape_estribor_1216'];
                      $motor_principal->temperatura_admision_general_1216 =  $inputs['temperatura_admision_general_1216'];
                      $motor_principal->presion_aire_1216                 =  $inputs['presion_aire_1216'];
                      $motor_principal->presion_agua_1216                 =  $inputs['presion_agua_1216'];
                      $motor_principal->presion_combustible_1216          =  $inputs['presion_combustible_1216'];

                      $motor_principal->rpm_1620                          =  $inputs['rpm_1620'];
                      $motor_principal->naceite_1620                      =  $inputs['naceite_1620'];
                      $motor_principal->relleno_1620                      =  $inputs['relleno_1620'];
                      $motor_principal->presion_aceite_1620               =  $inputs['presion_aceite_1620'];
                      $motor_principal->temperatura_aceite_1620           =  $inputs['temperatura_aceite_1620'];
                      $motor_principal->voltaje_bateria_1620              =  $inputs['voltaje_bateria_1620'];
                      $motor_principal->temperatura_escape_babor_1620     =  $inputs['temperatura_escape_babor_1620'];
                      $motor_principal->temperatura_escape_estribor_1620  =  $inputs['temperatura_escape_estribor_1620'];
                      $motor_principal->temperatura_admision_general_1620 =  $inputs['temperatura_admision_general_1620'];
                      $motor_principal->presion_aire_1620                 =  $inputs['presion_aire_1620'];
                      $motor_principal->presion_agua_1620                 =  $inputs['presion_agua_1620'];
                      $motor_principal->presion_combustible_1620          =  $inputs['presion_combustible_1620'];

                      $motor_principal->rpm_2024                          =  $inputs['rpm_2024'];
                      $motor_principal->naceite_2024                      =  $inputs['naceite_2024'];
                      $motor_principal->relleno_2024                      =  $inputs['relleno_2024'];
                      $motor_principal->presion_aceite_2024               =  $inputs['presion_aceite_2024'];
                      $motor_principal->temperatura_aceite_2024           =  $inputs['temperatura_aceite_2024'];
                      $motor_principal->voltaje_bateria_2024              =  $inputs['voltaje_bateria_2024'];
                      $motor_principal->temperatura_escape_babor_2024     =  $inputs['temperatura_escape_babor_2024'];
                      $motor_principal->temperatura_escape_estribor_2024  =  $inputs['temperatura_escape_estribor_2024'];
                      $motor_principal->temperatura_admision_general_2024 =  $inputs['temperatura_admision_general_2024'];
                      $motor_principal->presion_aire_2024                 =  $inputs['presion_aire_2024'];
                      $motor_principal->presion_agua_2024                 =  $inputs['presion_agua_2024'];
                      $motor_principal->presion_combustible_2024          =  $inputs['presion_combustible_2024'];


                      $motor_principal->id_usuario_c      =  $id_usuario;
                      $motor_principal->estado            =  1;//1 = activo
                      $motor_principal->save();

                      return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Motor Principal, guardado correctamente!', 'type' => 'success']);
                      }


            } catch (\Exception $e) {
              return redirect()->back()->with([
                  'alert' => 'Error!',
                  'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
                  'type' => 'error'
              ]);
          }

      }








  /*
  |--------------------------------------------------------------------------
  | MANTENEDOR - CONTRA MARCHA- BITACORA DE MAQUINA
  |--------------------------------------------------------------------------
  */


  public function cotramarcha($id)
  {
      // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }

    $contra_marcha = Contra_marcha::where('id_bitacora', $id)->first();
    $niveles_aceites=Niveles_de_aceite::all();

    if ($contra_marcha){
        return view('bdm_mantenedores.cotramarcha', compact( 'id', 'contra_marcha','niveles_aceites'));
    }else{
        return view('bdm_mantenedores.cotramarcha',compact('id','niveles_aceites'));
    }


  }




  public function contra_marcha_guardar(Request $request){

  try{
                // Verificar si el usuario está autenticado
                if (!auth()->check()) {
                  // Redireccionar al inicio de sesión u otra página según corresponda
                  return redirect()->route('login');
              }

            $inputs         = $request->all();
            $id_usuario     = auth()->user()->id;
            $id_bitacora    = $inputs['id_bitacora'];

            $contra_marcha = Contra_marcha::where('id_bitacora', $id_bitacora)->first();

            if ($contra_marcha) {
              // Modificar la información existente

                $contra_marcha->naceite_0004     =  $inputs['naceite_0004'];
                $contra_marcha->paceite_0004     =  $inputs['paceite_0004'];
                $contra_marcha->aceite_0004      =  $inputs['aceite_0004'];
                $contra_marcha->naceite_0408     =  $inputs['naceite_0408'];
                $contra_marcha->paceite_0408     =  $inputs['paceite_0408'];
                $contra_marcha->aceite_0408      =  $inputs['aceite_0408'];
                $contra_marcha->naceite_0812     =  $inputs['naceite_0812'];
                $contra_marcha->paceite_0812     =  $inputs['paceite_0812'];
                $contra_marcha->aceite_0812      =  $inputs['aceite_0812'];
                $contra_marcha->naceite_1216     =  $inputs['naceite_1216'];
                $contra_marcha->paceite_1216     =  $inputs['paceite_1216'];
                $contra_marcha->aceite_1216      =  $inputs['aceite_1216'];
                $contra_marcha->naceite_1620     =  $inputs['naceite_1620'];
                $contra_marcha->paceite_1620     =  $inputs['paceite_1620'];
                $contra_marcha->aceite_1620      =  $inputs['aceite_1620'];
                $contra_marcha->naceite_2024     =  $inputs['naceite_2024'];
                $contra_marcha->paceite_2024     =  $inputs['paceite_2024'];
                $contra_marcha->aceite_2024      =  $inputs['aceite_2024'];
                $contra_marcha->id_usuario_m     =  $id_usuario;
                $contra_marcha->estado           =  1;//1 = activo
                $contra_marcha->save();

              return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Contra Marcha, modificado correctamente!', 'type' => 'success']);
            } else {
              // Guardar nueva información
              $contra_marcha=new Contra_marcha;
              $contra_marcha->id_bitacora        =  $inputs['id_bitacora'];
              $contra_marcha->naceite_0004       =  $inputs['naceite_0004'];
              $contra_marcha->paceite_0004       =  $inputs['paceite_0004'];
              $contra_marcha->aceite_0004        =  $inputs['aceite_0004'];
              $contra_marcha->naceite_0408       =  $inputs['naceite_0408'];
              $contra_marcha->paceite_0408       =  $inputs['paceite_0408'];
              $contra_marcha->aceite_0408        =  $inputs['aceite_0408'];
              $contra_marcha->naceite_0812       =  $inputs['naceite_0812'];
              $contra_marcha->paceite_0812       =  $inputs['paceite_0812'];
              $contra_marcha->aceite_0812        =  $inputs['aceite_0812'];
              $contra_marcha->naceite_1216       =  $inputs['naceite_1216'];
              $contra_marcha->paceite_1216       =  $inputs['paceite_1216'];
              $contra_marcha->aceite_1216        =  $inputs['aceite_1216'];
              $contra_marcha->naceite_1620       =  $inputs['naceite_1620'];
              $contra_marcha->paceite_1620       =  $inputs['paceite_1620'];
              $contra_marcha->aceite_1620        =  $inputs['aceite_1620'];
              $contra_marcha->naceite_2024       =  $inputs['naceite_2024'];
              $contra_marcha->paceite_2024       =  $inputs['paceite_2024'];
              $contra_marcha->aceite_2024         =  $inputs['aceite_2024'];
              $contra_marcha->id_usuario_c       =  $id_usuario;
              $contra_marcha->estado             =  1;//1 = activo
              $contra_marcha->save();

              return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Contra Marcha, guardado correctamente!', 'type' => 'success']);
              }

        } catch (\Exception $e) {
          return redirect()->back()->with([
              'alert' => 'Error!',
              'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
              'type' => 'error'
          ]);
      }

   }



  /*
  |--------------------------------------------------------------------------
  | MANTENEDOR - Hytek- BITACORA DE MAQUINA
  |--------------------------------------------------------------------------
  */


  public function hytek($id)
  {

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }


    $hytek = hyteks::where('id_bitacora', $id)->first();
    $niveles_aceites=Niveles_de_aceite::all();

    if ($hytek){
        return view('bdm_mantenedores.hytek', compact( 'id', 'hytek','niveles_aceites'));
    }else{
        return view('bdm_mantenedores.hytek',compact('id','niveles_aceites'));
    }


  }




public function hytek_guardar(Request $request){

  try{
            // Verificar si el usuario está autenticado
            if (!auth()->check()) {
              // Redireccionar al inicio de sesión u otra página según corresponda
              return redirect()->route('login');
          }


          $inputs         = $request->all();
          $id_usuario     = auth()->user()->id;
          $id_bitacora    = $inputs['id_bitacora'];

          $hytek = hyteks::where('id_bitacora', $id_bitacora)->first();

          if ($hytek) {
            // Modificar la información existente

              $hytek->naceite_0004     =  $inputs['naceite_0004'];
              $hytek->paceite_0004     =  $inputs['paceite_0004'];
              $hytek->aceite_0004      =  $inputs['aceite_0004'];
              $hytek->naceite_0408     =  $inputs['naceite_0408'];
              $hytek->paceite_0408     =  $inputs['paceite_0408'];
              $hytek->aceite_0408      =  $inputs['aceite_0408'];
              $hytek->naceite_0812     =  $inputs['naceite_0812'];
              $hytek->paceite_0812     =  $inputs['paceite_0812'];
              $hytek->aceite_0812      =  $inputs['aceite_0812'];
              $hytek->naceite_1216     =  $inputs['naceite_1216'];
              $hytek->paceite_1216     =  $inputs['paceite_1216'];
              $hytek->aceite_1216      =  $inputs['aceite_1216'];
              $hytek->naceite_1620     =  $inputs['naceite_1620'];
              $hytek->paceite_1620     =  $inputs['paceite_1620'];
              $hytek->aceite_1620      =  $inputs['aceite_1620'];
              $hytek->naceite_2024     =  $inputs['naceite_2024'];
              $hytek->paceite_2024     =  $inputs['paceite_2024'];
              $hytek->aceite_2024      =  $inputs['aceite_2024'];
              $hytek->id_usuario_m     =  $id_usuario;
              $hytek->estado           =  1;//1 = activo
              $hytek->save();

            return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Hytek, modificado correctamente!', 'type' => 'success']);
          } else {
            // Guardar nueva información
            $hytek=new Hyteks;
            $hytek->id_bitacora        =  $inputs['id_bitacora'];
            $hytek->naceite_0004       =  $inputs['naceite_0004'];
            $hytek->paceite_0004       =  $inputs['paceite_0004'];
            $hytek->aceite_0004        =  $inputs['aceite_0004'];
            $hytek->naceite_0408       =  $inputs['naceite_0408'];
            $hytek->paceite_0408       =  $inputs['paceite_0408'];
            $hytek->aceite_0408        =  $inputs['aceite_0408'];
            $hytek->naceite_0812       =  $inputs['naceite_0812'];
            $hytek->paceite_0812       =  $inputs['paceite_0812'];
            $hytek->aceite_0812        =  $inputs['aceite_0812'];
            $hytek->naceite_1216       =  $inputs['naceite_1216'];
            $hytek->paceite_1216       =  $inputs['paceite_1216'];
            $hytek->aceite_1216        =  $inputs['aceite_1216'];
            $hytek->naceite_1620       =  $inputs['naceite_1620'];
            $hytek->paceite_1620       =  $inputs['paceite_1620'];
            $hytek->aceite_1620        =  $inputs['aceite_1620'];
            $hytek->naceite_2024       =  $inputs['naceite_2024'];
            $hytek->paceite_2024       =  $inputs['paceite_2024'];
            $hytek->aceite_2024         =  $inputs['aceite_2024'];
            $hytek->id_usuario_c       =  $id_usuario;
            $hytek->estado             =  1;//1 = activo
            $hytek->save();

            return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Hytek, guardado correctamente!', 'type' => 'success']);
            }


      } catch (\Exception $e) {
        return redirect()->back()->with([
            'alert' => 'Error!',
            'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
            'type' => 'error'
        ]);
    }

  }



  /*
  |--------------------------------------------------------------------------
  | MANTENEDOR - MAQUINA AUX BABOR- BITACORA DE MAQUINA
  |--------------------------------------------------------------------------
  */


      public function mauxbabor($id)
      {

              // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }

        $m_aux_babor = M_aux_babor::where('id_bitacora', $id)->first();
        $niveles_aceites=Niveles_de_aceite::all();

        if ($m_aux_babor){
            return view('bdm_mantenedores.mauxbabor', compact( 'id', 'm_aux_babor','niveles_aceites'));
        }else{
            return view('bdm_mantenedores.mauxbabor',compact('id','niveles_aceites'));
        }

      }




public function m_aux_babor_guardar(Request $request){

try{


                // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }

          $inputs         = $request->all();
          $id_usuario     = auth()->user()->id;
          $id_bitacora    = $inputs['id_bitacora'];

        $m_aux_babor = M_aux_babor::where('id_bitacora', $id_bitacora)->first();

        if ($m_aux_babor) {
            // Modificar la información existente

            $m_aux_babor->naceite_0004      =  $inputs['naceite_0004'];
            $m_aux_babor->paceite_0004      =  $inputs['taceite_0004'];
            $m_aux_babor->volt_0004         =  $inputs['volt_0004'];
            $m_aux_babor->amp_0004          =  $inputs['amp_0004'];
            $m_aux_babor->ciclos_0004       =  $inputs['ciclos_0004'];
            $m_aux_babor->naceite_0408      =  $inputs['naceite_0408'];
            $m_aux_babor->paceite_0408      =  $inputs['taceite_0408'];
            $m_aux_babor->paceite_0812      =  $inputs['taceite_0812'];
            $m_aux_babor->volt_0408         =  $inputs['volt_0408'];
            $m_aux_babor->amp_0408          =  $inputs['amp_0408'];
            $m_aux_babor->ciclos_0408       =  $inputs['ciclos_0408'];
            $m_aux_babor->naceite_0812      =  $inputs['naceite_0812'];
            $m_aux_babor->paceite_0812      =  $inputs['taceite_0812'];
            $m_aux_babor->volt_0812         =  $inputs['volt_0812'];
            $m_aux_babor->amp_0812          =  $inputs['amp_0812'];
            $m_aux_babor->ciclos_0812       =  $inputs['ciclos_0812'];
            $m_aux_babor->naceite_1216      =  $inputs['naceite_1216'];
            $m_aux_babor->paceite_1216      =  $inputs['taceite_1216'];
            $m_aux_babor->volt_1216         =  $inputs['volt_1216'];
            $m_aux_babor->amp_1216          =  $inputs['amp_1216'];
            $m_aux_babor->ciclos_1216       =  $inputs['ciclos_1216'];
            $m_aux_babor->naceite_1620      =  $inputs['naceite_1620'];
            $m_aux_babor->paceite_1620      =  $inputs['taceite_1620'];
            $m_aux_babor->volt_1620         =  $inputs['volt_1620'];
            $m_aux_babor->amp_1620          =  $inputs['amp_1620'];
            $m_aux_babor->ciclos_1620       =  $inputs['ciclos_1620'];
            $m_aux_babor->naceite_2024      =  $inputs['naceite_2024'];
            $m_aux_babor->paceite_2024      =  $inputs['taceite_2024'];
            $m_aux_babor->volt_2024         =  $inputs['volt_2024'];
            $m_aux_babor->amp_2024          =  $inputs['amp_2024'];
            $m_aux_babor->ciclos_2024       =  $inputs['ciclos_2024'];
            $m_aux_babor->id_usuario_m      =  $id_usuario;
            $m_aux_babor->estado            =  1;//1 = activo
            $m_aux_babor->save();

            return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'M. Aux Babor, modificado correctamente!', 'type' => 'success']);
          } else {
             // Guardar nueva información
             $m_aux_babor=new M_aux_babor;
             $m_aux_babor->id_bitacora       = $inputs['id_bitacora'];

             $m_aux_babor->naceite_0004      =  $inputs['naceite_0004'];
             $m_aux_babor->paceite_0004      =  $inputs['taceite_0004'];
             $m_aux_babor->volt_0004         =  $inputs['volt_0004'];
             $m_aux_babor->amp_0004          =  $inputs['amp_0004'];
             $m_aux_babor->ciclos_0004       =  $inputs['ciclos_0004'];
             $m_aux_babor->naceite_0408      =  $inputs['naceite_0408'];
             $m_aux_babor->paceite_0408      =  $inputs['taceite_0408'];
             $m_aux_babor->paceite_0812      =  $inputs['taceite_0812'];
             $m_aux_babor->volt_0408         =  $inputs['volt_0408'];
             $m_aux_babor->amp_0408          =  $inputs['amp_0408'];
             $m_aux_babor->ciclos_0408       =  $inputs['ciclos_0408'];
             $m_aux_babor->naceite_0812      =  $inputs['naceite_0812'];
             $m_aux_babor->paceite_0812      =  $inputs['taceite_0812'];
             $m_aux_babor->volt_0812         =  $inputs['volt_0812'];
             $m_aux_babor->amp_0812          =  $inputs['amp_0812'];
             $m_aux_babor->ciclos_0812       =  $inputs['ciclos_0812'];
             $m_aux_babor->naceite_1216      =  $inputs['naceite_1216'];
             $m_aux_babor->paceite_1216      =  $inputs['taceite_1216'];
             $m_aux_babor->volt_1216         =  $inputs['volt_1216'];
             $m_aux_babor->amp_1216          =  $inputs['amp_1216'];
             $m_aux_babor->ciclos_1216       =  $inputs['ciclos_1216'];
             $m_aux_babor->naceite_1620      =  $inputs['naceite_1620'];
             $m_aux_babor->paceite_1620      =  $inputs['taceite_1620'];
             $m_aux_babor->volt_1620         =  $inputs['volt_1620'];
             $m_aux_babor->amp_1620          =  $inputs['amp_1620'];
             $m_aux_babor->ciclos_1620       =  $inputs['ciclos_1620'];
             $m_aux_babor->naceite_2024      =  $inputs['naceite_2024'];
             $m_aux_babor->paceite_2024      =  $inputs['taceite_2024'];
             $m_aux_babor->volt_2024         =  $inputs['volt_2024'];
             $m_aux_babor->amp_2024          =  $inputs['amp_2024'];
             $m_aux_babor->ciclos_2024       =  $inputs['ciclos_2024'];
             $m_aux_babor->id_usuario_c      =  $id_usuario;
             $m_aux_babor->estado            =  1;//1 = activo
             $m_aux_babor->save();

             return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'M. Aux Babor, guardado correctamente!', 'type' => 'success']);
            }

    } catch (\Exception $e) {
      return redirect()->back()->with([
          'alert' => 'Error!',
          'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
          'type' => 'error'
      ]);
  }


  }







  /*
  |--------------------------------------------------------------------------
  | MANTENEDOR - MOTOR AUXILIAR ESTRIBOR- BITACORA DE MAQUINA
  |--------------------------------------------------------------------------
  */


  public function motor_auxiliar_estribor($id)
  {

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }

    $motor_auxiliar_estribor = Motor_auxiliar_estribor::where('id_bitacora', $id)->first();
    $niveles_aceites=Niveles_de_aceite::all();



    if ($motor_auxiliar_estribor){
        return view('bdm_mantenedores.motor_auxiliar_estribor', compact( 'id', 'motor_auxiliar_estribor','niveles_aceites'));
    }else{
        return view('bdm_mantenedores.motor_auxiliar_estribor',compact('id','niveles_aceites'));
    }

  }



  public function motor_auxiliar_estribor_guardar(Request $request){

    try{

         // Verificar si el usuario está autenticado
          if (!auth()->check())
          {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
          }

          $inputs         = $request->all();
          $id_usuario     = auth()->user()->id;
          $id_bitacora    = $inputs['id_bitacora'];

          $motor_auxiliar_estribor = Motor_auxiliar_estribor::where('id_bitacora', $id_bitacora)->first();

          if ($motor_auxiliar_estribor) {
              // Modificar la información existente
              $motor_auxiliar_estribor->naceite_0004     =  $inputs['naceite_0004'];
              $motor_auxiliar_estribor->taceite_0004     =  $inputs['taceite_0004'];
              $motor_auxiliar_estribor->volt_0004        =  $inputs['volt_0004'];
              $motor_auxiliar_estribor->amp_0004         =  $inputs['amp_0004'];
              $motor_auxiliar_estribor->ciclos_0004      =  $inputs['ciclos_0004'];
              $motor_auxiliar_estribor->naceite_0408     =  $inputs['naceite_0408'];
              $motor_auxiliar_estribor->taceite_0408     =  $inputs['taceite_0408'];
              $motor_auxiliar_estribor->volt_0408        =  $inputs['volt_0408'];
              $motor_auxiliar_estribor->amp_0408         =  $inputs['amp_0408'];
              $motor_auxiliar_estribor->ciclos_0408      =  $inputs['ciclos_0408'];
              $motor_auxiliar_estribor->naceite_0812     =  $inputs['naceite_0812'];
              $motor_auxiliar_estribor->taceite_0812     =  $inputs['taceite_0812'];
              $motor_auxiliar_estribor->volt_0812        =  $inputs['volt_0812'];
              $motor_auxiliar_estribor->amp_0812         =  $inputs['amp_0812'];
              $motor_auxiliar_estribor->ciclos_0812      =  $inputs['ciclos_0812'];
              $motor_auxiliar_estribor->naceite_1216     =  $inputs['naceite_1216'];
              $motor_auxiliar_estribor->taceite_1216     =  $inputs['taceite_1216'];
              $motor_auxiliar_estribor->volt_1216        =  $inputs['volt_1216'];
              $motor_auxiliar_estribor->amp_1216         =  $inputs['amp_1216'];
              $motor_auxiliar_estribor->ciclos_1216      =  $inputs['ciclos_1216'];
              $motor_auxiliar_estribor->naceite_1620     =  $inputs['naceite_1620'];
              $motor_auxiliar_estribor->taceite_1620     =  $inputs['taceite_1620'];
              $motor_auxiliar_estribor->volt_1620        =  $inputs['volt_1620'];
              $motor_auxiliar_estribor->amp_1620         =  $inputs['amp_1620'];
              $motor_auxiliar_estribor->ciclos_1620      =  $inputs['ciclos_1620'];
              $motor_auxiliar_estribor->naceite_2024     =  $inputs['naceite_2024'];
              $motor_auxiliar_estribor->taceite_2024     =  $inputs['taceite_2024'];
              $motor_auxiliar_estribor->volt_2024        =  $inputs['volt_2024'];
              $motor_auxiliar_estribor->amp_2024         =  $inputs['amp_2024'];
              $motor_auxiliar_estribor->ciclos_2024      =  $inputs['ciclos_2024'];
              $motor_auxiliar_estribor->id_usuario_m     =  $id_usuario;
              $motor_auxiliar_estribor->estado           =  1;//1 = activo

              $motor_auxiliar_estribor->save();
              return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Motor Auxiliar Estribor, modificado correctamente!', 'type' => 'success']);
            } else {
              // Guardar nueva información
              $motor_auxiliar_estribor=new motor_auxiliar_estribor;
              $motor_auxiliar_estribor->id_bitacora       = $inputs['id_bitacora'];
              $motor_auxiliar_estribor->naceite_0004     =  $inputs['naceite_0004'];
              $motor_auxiliar_estribor->taceite_0004     =  $inputs['taceite_0004'];
              $motor_auxiliar_estribor->volt_0004        =  $inputs['volt_0004'];
              $motor_auxiliar_estribor->amp_0004         =  $inputs['amp_0004'];
              $motor_auxiliar_estribor->ciclos_0004      =  $inputs['ciclos_0004'];
              $motor_auxiliar_estribor->naceite_0408     =  $inputs['naceite_0408'];
              $motor_auxiliar_estribor->taceite_0408     =  $inputs['taceite_0408'];
              $motor_auxiliar_estribor->volt_0408        =  $inputs['volt_0408'];
              $motor_auxiliar_estribor->amp_0408         =  $inputs['amp_0408'];
              $motor_auxiliar_estribor->ciclos_0408      =  $inputs['ciclos_0408'];
              $motor_auxiliar_estribor->naceite_0812     =  $inputs['naceite_0812'];
              $motor_auxiliar_estribor->taceite_0812     =  $inputs['taceite_0812'];
              $motor_auxiliar_estribor->volt_0812        =  $inputs['volt_0812'];
              $motor_auxiliar_estribor->amp_0812         =  $inputs['amp_0812'];
              $motor_auxiliar_estribor->ciclos_0812      =  $inputs['ciclos_0812'];
              $motor_auxiliar_estribor->naceite_1216     =  $inputs['naceite_1216'];
              $motor_auxiliar_estribor->taceite_1216     =  $inputs['taceite_1216'];
              $motor_auxiliar_estribor->volt_1216        =  $inputs['volt_1216'];
              $motor_auxiliar_estribor->amp_1216         =  $inputs['amp_1216'];
              $motor_auxiliar_estribor->ciclos_1216      =  $inputs['ciclos_1216'];
              $motor_auxiliar_estribor->naceite_1620     =  $inputs['naceite_1620'];
              $motor_auxiliar_estribor->taceite_1620     =  $inputs['taceite_1620'];
              $motor_auxiliar_estribor->volt_1620        =  $inputs['volt_1620'];
              $motor_auxiliar_estribor->amp_1620         =  $inputs['amp_1620'];
              $motor_auxiliar_estribor->ciclos_1620      =  $inputs['ciclos_1620'];
              $motor_auxiliar_estribor->naceite_2024     =  $inputs['naceite_2024'];
              $motor_auxiliar_estribor->taceite_2024     =  $inputs['taceite_2024'];
              $motor_auxiliar_estribor->volt_2024        =  $inputs['volt_2024'];
              $motor_auxiliar_estribor->amp_2024         =  $inputs['amp_2024'];
              $motor_auxiliar_estribor->ciclos_2024      =  $inputs['ciclos_2024'];

              $motor_auxiliar_estribor->id_usuario_c     =  $id_usuario;
              $motor_auxiliar_estribor->estado           =  1;//1 = activo

              $motor_auxiliar_estribor->save();
              return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Motor Auxiliar Estribor, guardado correctamente!', 'type' => 'success']);
              }

          } catch (\Exception $e) {
            return redirect()->back()->with([
                'alert' => 'Error!',
                'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
                'type' => 'error'
            ]);
        }


  }



   /*
  |--------------------------------------------------------------------------
  | MANTENEDOR - ESTADO DE EQUIPO Y ALARMA - BITACORA DE MAQUINA
  |--------------------------------------------------------------------------
  */


  public function estadosdeequipoyalarma($id)
  {


          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }

    $estados_de_equipo_y_alarma = estados_de_equipo_y_alarma::where('id_bitacora', $id)->first();
    $estados_equipoyalarma      = estados_equipos_y_alarmas::all();



    if ($estados_de_equipo_y_alarma){
        return view('bdm_mantenedores.estadosdeequipoyalarma', compact( 'id', 'estados_de_equipo_y_alarma','estados_equipoyalarma'));
    }else{
        return view('bdm_mantenedores.estadosdeequipoyalarma', compact( 'id', 'estados_equipoyalarma'));
    }

  }






  public function estados_de_equipo_y_alarma_guardar(Request $request){

    try{

            // Verificar si el usuario está autenticado
            if (!auth()->check()) {
              // Redireccionar al inicio de sesión u otra página según corresponda
              return redirect()->route('login');
          }

          $inputs         = $request->all();
          $id_usuario     = auth()->user()->id;
          $id_bitacora    = $inputs['id_bitacora'];



         $estados_de_equipo_y_alarma = Estados_de_equipo_y_alarma::where('id_bitacora', $id_bitacora)->first();

          if ($estados_de_equipo_y_alarma) {
              // Modificar la información existente

              $estados_de_equipo_y_alarma->alternador_mp    =  $inputs['alternador_mp'];
              $estados_de_equipo_y_alarma->bba_pescado      =  $inputs['bba_pescado'];
              $estados_de_equipo_y_alarma->alternador_ma    =  $inputs['alternador_ma'];
              $estados_de_equipo_y_alarma->winche           =  $inputs['winche'];
              $estados_de_equipo_y_alarma->luces            =  $inputs['luces'];
              $estados_de_equipo_y_alarma->anet_winch       =  $inputs['anet_winch'];
              $estados_de_equipo_y_alarma->baterias         =  $inputs['baterias'];
              $estados_de_equipo_y_alarma->net_stacker      =  $inputs['net_stacker'];
              $estados_de_equipo_y_alarma->gobierno         =  $inputs['gobierno'];
              $estados_de_equipo_y_alarma->racel            =  $inputs['racel'];
              $estados_de_equipo_y_alarma->propulsion       =  $inputs['propulsion'];
              $estados_de_equipo_y_alarma->sentina          =  $inputs['sentina'];
              $estados_de_equipo_y_alarma->bra_archique     =  $inputs['bra_archique'];
              $estados_de_equipo_y_alarma->p_mp             =  $inputs['p_mp'];
              $estados_de_equipo_y_alarma->estanque         =  $inputs['estanque'];
              $estados_de_equipo_y_alarma->t_mp             =  $inputs['t_mp'];
              $estados_de_equipo_y_alarma->id_usuario_m     =  $id_usuario;
              $estados_de_equipo_y_alarma->estado           =  1;//1 = activo
              $estados_de_equipo_y_alarma->save();
              return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Estado de equipo y alarma, modificado correctamente!', 'type' => 'success']);
            } else {
              // Guardar nueva información
              $estados_de_equipo_y_alarma=new Estados_de_equipo_y_alarma;
              $estados_de_equipo_y_alarma->id_bitacora       = $inputs['id_bitacora'];
              $estados_de_equipo_y_alarma->alternador_mp    =  $inputs['alternador_mp'];
              $estados_de_equipo_y_alarma->bba_pescado      =  $inputs['bba_pescado'];
              $estados_de_equipo_y_alarma->alternador_ma    =  $inputs['alternador_ma'];
              $estados_de_equipo_y_alarma->winche           =  $inputs['winche'];
              $estados_de_equipo_y_alarma->luces            =  $inputs['luces'];
              $estados_de_equipo_y_alarma->anet_winch       =  $inputs['anet_winch'];
              $estados_de_equipo_y_alarma->baterias         =  $inputs['baterias'];
              $estados_de_equipo_y_alarma->net_stacker      =  $inputs['net_stacker'];
              $estados_de_equipo_y_alarma->gobierno         =  $inputs['gobierno'];
              $estados_de_equipo_y_alarma->racel            =  $inputs['racel'];
              $estados_de_equipo_y_alarma->propulsion       =  $inputs['propulsion'];
              $estados_de_equipo_y_alarma->sentina          =  $inputs['sentina'];
              $estados_de_equipo_y_alarma->bra_archique     =  $inputs['bra_archique'];
              $estados_de_equipo_y_alarma->p_mp             =  $inputs['p_mp'];
              $estados_de_equipo_y_alarma->estanque         =  $inputs['estanque'];
              $estados_de_equipo_y_alarma->t_mp             =  $inputs['t_mp'];
              $estados_de_equipo_y_alarma->id_usuario_c     =  $id_usuario;
              $estados_de_equipo_y_alarma->estado           =  1;//1 = activo
              $estados_de_equipo_y_alarma->save();
              return redirect()->back()->with(['alert' => 'Correcto!', 'message' => 'Estado de equipo y alarma, guardado correctamente!', 'type' => 'success']);
              }

      } catch (\Exception $e) {
        return redirect()->back()->with([
            'alert' => 'Error!',
            'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
            'type' => 'error'
        ]);
    }

}

public function finalizabitacora($id_bitacora){

  try{

    // Verificar si el usuario está autenticado
    if (!auth()->check())
    {
      // Redireccionar al inicio de sesión u otra página según corresponda
      return redirect()->route('login');
    }

    //  $inputs         = $request->all();
      $id_usuario     = auth()->user()->id;
      //$id_bitacora    = $inputs['id_bitacora'];

      $bitacora = bitacora::where('id', $id_bitacora)->first();

      if ($bitacora)
      {
          // Modificar la información existente

          $bitacora->id_usuario_m   =  $id_usuario;
          $bitacora->estado         =  2; //finalizado
          $bitacora->save();



          return redirect()->route('home')->with('success', 'Registros guardados exitosamente.');


      }

    } catch (\Exception $e) {
      return redirect()->back()->with([
          'alert' => 'Error!',
          'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió un error al modificarlos: ' . $e->getMessage(),
          'type' => 'error'
      ]);
  }
}
}

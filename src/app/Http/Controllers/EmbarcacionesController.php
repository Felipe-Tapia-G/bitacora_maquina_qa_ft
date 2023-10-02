<?php

namespace App\Http\Controllers;

use App\Models\Embarcacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Armador;

use App\Models\Estados;
// inicio para validar errores de  fk
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
//fin  para validar errores de  fk

class EmbarcacionesController extends Controller
{
  
  public function __construct()
  {
      $this->middleware(function ($request, $next) {
        if ((auth()->user()->perfil != 100 && auth()->user()->perfil != 2) || auth()->user()->estado == 0) {
              return redirect()->back()->with([
                  'alert' => 'Error!',
                  'message' => 'Lo siento, pero no tienes los permisos necesarios para acceder a la página anterior. Por favor, ponte en contacto con el administrador del sistema para obtener más información o solicitar acceso a esta página. Gracias.',
                  'type' => 'error'
              ]);
          }

          return $next($request);
      });
  }
  

  public function index()
  {

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }
 
    $armador              = auth()->user()->armador;
    $user_armador = auth()->user()->armador;
   
    $embarcacion = Embarcacion::leftjoin('estados',     'embarcacion.estado',             '=', 'estados.id')
                              ->leftjoin('users',       'embarcacion.id_usuario',         '=', 'users.id')
                              ->select(
                                        'embarcacion.id         as id',
                                        'embarcacion.nombre     as nombre',
                                         'estados.nombre         as estado',
                                        'users.name             as nom_usuario'
                                        
                                      )
                              ->where('embarcacion.armador','=',$armador)
                              ->get();
   

    return view('embarcacion.index',compact('embarcacion'));
  }
  
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
  
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
          // Redireccionar al inicio de sesión u otra página según corresponda
          return redirect()->route('login');
      }
     $armador     = auth()->user()->armador;

     $estado      = Estados::all();

    return view('embarcacion.create', compact('estado'));
  }
  

  public function store(Request $request)
  {

    try{

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }

        $id_usuario     = auth()->user()->id;
        $armador        = auth()->user()->armador;
        
        $inputs         = $request->all();

        $inputs = array_map("strtoupper", $inputs);
        $check = Embarcacion::where('nombre',$inputs['nombre'])->where('armador',$armador)->exists();
      
        

        if($check){
                    return redirect()->back()->with([
                                                      'alert' => 'Error!',
                                                      'message' => 'La Embarcacion que intenta crear ya existe',
                                                      'type' => 'error'
                                                    ]);

                  }else{

                          $embarcacion=new Embarcacion;
                          $embarcacion->nombre                =  $inputs['nombre'];
                          $embarcacion->id_usuario            =  $id_usuario;
                          $embarcacion->estado                =  $inputs['estado'];
                          $embarcacion->cantidad_motores_aux  =  $inputs['cantidad_motores_aux'];
                          $embarcacion->armador               =  $armador;
                          $embarcacion->save();

                          return redirect()->back()->with(['alert' => 'Correcto!','message'=>'Dato insertado correctamente!','type'=>'success']);
                        }



                      } catch (\Exception $e) {
                        return redirect()->back()->with([
                            'alert' => 'Error!',
                            'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
                            'type' => 'error'
                        ]);
                    }

  }
  

  public function edit(Embarcacion $embarcacion)
  {
      
    
          // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }

    $armador     = auth()->user()->armador;
   
    $estado = Estados::all();
 
         
    return view('embarcacion.edit', compact('embarcacion', 'estado'));

  }
  

  public function update(Request $request, Embarcacion $embarcacion)
  {

    try{

              
                    // Verificar si el usuario está autenticado
                    if (!auth()->check()) {
                      // Redireccionar al inicio de sesión u otra página según corresponda
                      return redirect()->route('login');
                  }

              $id_usuario   =   auth()->user()->id;
              $armador      = auth()->user()->armador;
          
              $inputs       =   $request->all();
          
              $inputs       =   array_map("strtoupper", $inputs);
              $check        =   Embarcacion::where('nombre',$inputs['nombre'])->where('id','!=',$inputs['id'])->where('armador',$armador)->exists();
              $validador    =   Embarcacion::where('id','=',$inputs['id'])->exists();


              if($validador)
              {// Valida si el usuario esta registrando un registro de que es de su armador en caso contrario lo devuelve con un mensaje de error! 

              
                  if($check){

                  
                    return redirect()->back()->with([
                      'alert' => 'Error!',
                      'message' => 'La embarcacion que intenta crear ya existe',
                      'type' => 'error'
                  ]);
                  }else{
                            $embarcacion->nombre                = $inputs['nombre']; 
                            $embarcacion->estado                = $request->input('estado');
                            $embarcacion->id_usuario_modifica   = $id_usuario;   
                            $embarcacion->cantidad_motores_aux  =  $inputs['cantidad_motores_aux'];              
                            $embarcacion->save();
                            return redirect()->back()->with(['alert' => 'Correcto!','message'=>'Dato actualizado correctamente!','type'=>'success']);
                        
                          }
              }
              return redirect()->back()->with([
                                              'alert' => 'Error!',
                                              'message' => 'Lo sentimos, no tiene los permisos necesarios para modificar registros de otro armador. Por favor, contacte al administrador del sistema si necesita asistencia',
                                              'type' => 'error'
                                            ]);


            } catch (\Exception $e) {
              return redirect()->back()->with([
                  'alert' => 'Error!',
                  'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
                  'type' => 'error'
              ]);
          }
                                            


  }
  

  //public function destroy(Embarcacion $embarcacion)
  public function destroy($id)
  {

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }

        
    $armador = auth()->user()->armador;
          try{
                  //$embarcacion->delete();

                  $deleted = Embarcacion::where('id', $id)
                  ->where('armador', $armador)
                  ->delete();

                  return redirect()->back()->with([
                                                  'alert' => 'Correcto!',
                                                  'message' => 'Dato eliminado correctamente!',
                                                  'type' => 'success'
                                                  ]);
            }catch (QueryException $e){
                    if ($e->errorInfo[1] === 1451)
                    {
                          return redirect()->back()->with([
                                                            'alert' => 'Error!',
                                                            'message' => 'Lo siento, no se puede eliminar la embarcación porque está relacionada con otros datos del sistema y la eliminación podría afectar la integridad de esos datos..',
                                                            'type' => 'error'
                                                        ]);
                    }else{
                          return redirect()->back()->with([
                                                              'alert' => 'Error!',
                                                              'message' => 'Ocurrió un error al eliminar la embarcación.',
                                                              'type' => 'error'
                                                          ]);
                        }
            }


  }
}

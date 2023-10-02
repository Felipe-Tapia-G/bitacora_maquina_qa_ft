<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Armador;

use App\Models\Estados;
// inicio para validar errores de  fk
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
//fin  para validar errores de  fk

class MotoristaController extends Controller
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
 
    $armador      = auth()->user()->armador;
    $user_armador = auth()->user()->armador;
   
    $motorista = Motorista::leftjoin('estados',     'motorista.estado',             '=', 'estados.id')
                             
                              ->select(
                                        'motorista.id           as id',
                                        'motorista.nombres      as nombre',
                                        'motorista.rut          as rut',
                                        'estados.nombre        as estado'                                       
                                        
                                      )
                              ->where('motorista.armador','=',$armador)
                              ->get();
   

    return view('motorista.index',compact('motorista'));
  }
  


  public function create()
  {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
          // Redireccionar al inicio de sesión u otra página según corresponda
          return redirect()->route('login');
      }
  
     $armador     = auth()->user()->armador;

     $estado      = Estados::all();

    return view('motorista.create', compact('estado'));
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
        $check = Motorista::where('rut',$inputs['rut'])->where('armador',$armador)->exists();
        

        if($check){
                    return redirect()->back()->with([
                                                      'alert' => 'Error!',
                                                      'message' => 'La motorista que intenta crear ya existe',
                                                      'type' => 'error'
                                                    ]);

                  }else{

                          $motorista=new motorista;
                          $motorista->nombres        =  $inputs['nombre'];
                          $motorista->rut        =  $inputs['rut'];
                          $motorista->id_usuario_c    =  $id_usuario;
                          $motorista->estado        =  $inputs['estado'];
                          $motorista->armador       =  $armador;
                          $motorista->save();

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
  

  public function edit(motorista $motorista)
  {
      
          // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }

    $armador     = auth()->user()->armador;
   
    $estado = Estados::all();
 
         
    return view('motorista.edit', compact('motorista', 'estado'));

  }
  

  public function update(Request $request, motorista $motorista)
  {
    

    try{

          // Verificar si el usuario está autenticado
          if (!auth()->check()){
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
            }

        $id_usuario   =   auth()->user()->id;
        $armador      =   auth()->user()->armador;
    
        $inputs       =   $request->all();
    
        $inputs       =   array_map("strtoupper", $inputs);
        $check        =   motorista::where('rut',$inputs['rut'])->where('id','!=',$inputs['id'])->where('nombres','=',$inputs['nombre'])->where('armador',$armador)->exists();
        $validador    =   motorista::where('id','=',$inputs['id'])->exists();


        if($validador)
        {// Valida si el usuario esta registrando un registro de que es de su armador en caso contrario lo devuelve con un mensaje de error! 

        
            if($check){

            
              return redirect()->back()->with([
                'alert' => 'Error!',
                'message' => 'El motorista que intenta crear ya existe',
                'type' => 'error'
            ]);
            }else{
                      $motorista->nombres               = $inputs['nombre']; 
                      $motorista->rut                   = $inputs['rut']; 
                      $motorista->estado                = $request->input('estado');
                      $motorista->id_usuario_m          = $id_usuario;                 
                      $motorista->save();
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
  

  public function destroy($id)
  {

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }

        
      $armador = auth()->user()->armador;
  
      try {
          $deleted = motorista::where('id', $id)
              ->where('armador', $armador)
              ->delete();
  

              return redirect()->back()->with([
                'alert' => 'Correcto!',
                'message' => 'Dato eliminado correctamente!',
                'type' => 'success'
                ]);

                
          if ($deleted) {
              return redirect()->back()->with([
                  'alert' => 'Correcto!',
                  'message' => 'Dato eliminado correctamente!',
                  'type' => 'success'
              ]);


              
          } else {
              return redirect()->back()->with([
                  'alert' => 'Error!',
                  'message' => 'No se encontró el motorista o no tienes permisos para eliminarlo.',
                  'type' => 'error'
              ]);
          }
      } catch (QueryException $e) {
          if ($e->errorInfo[1] === 1451) {
              return redirect()->back()->with([
                  'alert' => 'Error!',
                  'message' => 'Lo siento, no se puede eliminar el motorista porque está relacionado con otros datos del sistema y la eliminación podría afectar la integridad de esos datos.',
                  'type' => 'error'
              ]);
          } else {
              return redirect()->back()->with([
                  'alert' => 'Error!',
                  'message' => 'Ocurrió un error al eliminar el motorista.',
                  'type' => 'error'
              ]);
          }
      }
  }
  
  

  
}

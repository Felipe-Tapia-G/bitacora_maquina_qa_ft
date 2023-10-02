<?php

namespace App\Http\Controllers;
use App\Models\Condiciones_de_campos;

use App\Models\Armador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Estados;
// inicio para validar errores de  fk
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
//fin  para validar errores de  fk


class ArmadoresController extends Controller
{
  
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  /*
  public function __construct()
  {
    //$this->middleware('auth');
    //$this->middleware('admin');
    //$this->middleware(['auth', 'perfil:100']);

 

  }*/






  public function index()
  {
    
          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }

    if( 100 != auth()->user()->perfil){ return view('sinacceso.index');}//Se valida si el usuario es un superadministrador. Si es así, se le permite el acceso. De lo contrario, se redirige al usuario a una página que indica que no tiene acceso."

  
      $armadores =   Armador::leftjoin('estados', 'estados.id', '=', 'armador.estado')
                            ->select(
                              'armador.id as id',
                              'armador.nombre as nombre',
                              'estados.nombre as estado'
                            )->get();
        
      
      return view('armador.index',compact('armadores'));


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

    if( 100 != auth()->user()->perfil){ return view('sinacceso.index');}//Se valida si el usuario es un superadministrador. Si es así, se le permite el acceso. De lo contrario, se redirige al usuario a una página que indica que no tiene acceso."

            $estado = Estados::all();
            return view('armador.create',compact('estado'));
    
   
  }
  
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    try{

              // Verificar si el usuario está autenticado
              if (!auth()->check()) {
                // Redireccionar al inicio de sesión u otra página según corresponda
                return redirect()->route('login');
            }

            if( 100 != auth()->user()->perfil){ return view('sinacceso.index');}//Se valida si el usuario es un superadministrador. Si es así, se le permite el acceso. De lo contrario, se redirige al usuario a una página que indica que no tiene acceso."


                    $inputs       =   $request->all();
                    $armador      =   auth()->user()->armador;
                    $id_usuario   =   auth()->user()->id;

                    $inputs       =   array_map("strtoupper", $inputs);
                    $check        =   Armador::where('nombre',$inputs['nombre'])->exists();
               
                      if($check){
                        return redirect()->back()->with([
                          'alert' => 'Error!',
                          'message' => 'El Armador que intenta crear ya existe',
                          'type' => 'error'
                      ]);

                    }else{
    
                           
                    
                        $armador=new Armador;
                        $armador->estado         =  $inputs['estado'];
                        $armador->nombre         =  $inputs['nombre'];
                        $armador->id_usuario_c   =  $id_usuario;

                       

                        $armador->save();
                      

                        return redirect()->back()->with(['alert' => 'Correcto!','message'=>'Dato guardado correctamente!','type'=>'success']);
                    }


          } catch (\Exception $e) {
            return redirect()->back()->with([
                'alert' => 'Error!',
                'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
                'type' => 'error'
            ]);
        }


  }
  
  // /**
  // * Display the specified resource.
  // *
  // * @param  \App\Models\Capitan  $capitan
  // * @return \Illuminate\Http\Response
  // */
  // public function show(Capitan $capitan)
  // {
  //   //
  // }
  
  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Armador  $capitan
  * @return \Illuminate\Http\Response
  */
  public function edit(Armador $armador)
  {

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }

    if( 100 != auth()->user()->perfil){ return view('sinacceso.index');}//Se valida si el usuario es un superadministrador. Si es así, se le permite el acceso. De lo contrario, se redirige al usuario a una página que indica que no tiene acceso."

          $estado = Estados::all();
          return view('armador.edit',compact('armador','estado'));



  }
  
  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Armador  $capitan
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Armador $armador)
  {


    try{

            // Verificar si el usuario está autenticado
            if (!auth()->check()) {
              // Redireccionar al inicio de sesión u otra página según corresponda
              return redirect()->route('login');
          }


        if( 100 != auth()->user()->perfil){ return view('sinacceso.index');}//Se valida si el usuario es un superadministrador. Si es así, se le permite el acceso. De lo contrario, se redirige al usuario a una página que indica que no tiene acceso."


             $id_usuario     = auth()->user()->id;
                    
                      $inputs       =   $request->all();
                      $inputs       =   array_map("strtoupper", $inputs);
                      $check        =   Armador::where('nombre',$inputs['nombre'])->where('id','!=',$inputs['id'])->exists();

                     // return $inputs;
                          if($check)
                          {
                                  return redirect()->back()->with([
                                                                  'alert'   => 'Error!',
                                                                  'message' => 'El Armador  que intenta modificar ya existe',
                                                                  'type'    => 'error'
                                                                  ]);
                          }else{
                                    $armador->nombre        = $inputs['nombre']; 
                                    $armador->estado        = $request->input('estado');
                                    $armador->id_usuario_m  = $id_usuario;
                                    $armador->save();
                                    return redirect()->back()->with(['alert' => 'Correcto!','message'=>'Dato actualizado correctamente!','type'=>'success']);
                                }
                    
          } catch (\Exception $e) {
            return redirect()->back()->with([
                'alert' => 'Error!',
                'message' => 'No se pudieron guardar los cambios solicitados. Ocurrió el siguiente error: ' . $e->getMessage(),
                'type' => 'error'
            ]);
        }

  }
  
  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Armador  $capitan
  * @return \Illuminate\Http\Response
  */
  public function destroy(Armador $armador)
  {

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }


    if( 100 != auth()->user()->perfil){ return view('sinacceso.index');}//Se valida si el usuario es un superadministrador. Si es así, se le permite el acceso. De lo contrario, se redirige al usuario a una página que indica que no tiene acceso."



    try{
      $armador->delete();
      return redirect()->back()->with([
                                      'alert' => 'Correcto!',
                                      'message' => 'Dato eliminado correctamente!',
                                      'type' => 'success'
                                            ]);
      }catch (QueryException $e)
      {
              if ($e->errorInfo[1] === 1451)
              {
                    return redirect()->back()->with([
                                                      'alert' => 'Error!',
                                                      'message' => 'Lo siento, no se puede eliminar el armador porque está relacionada con otros datos del sistema y la eliminación podría afectar la integridad de esos datos..',
                                                      'type' => 'error'
                                                  ]);
              }else{
                    return redirect()->back()->with([
                                                        'alert' => 'Error!',
                                                        'message' => 'Ocurrió un error al eliminar el armador.',
                                                        'type' => 'error'
                                                    ]);
                  }
      }





    
  }
}

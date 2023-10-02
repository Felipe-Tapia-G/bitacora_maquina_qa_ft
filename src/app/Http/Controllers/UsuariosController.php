<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Armador;
use App\Models\Embarcacion;
use App\Models\Estados;
use App\Models\Perfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// inicio para validar errores de  fk
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
//fin  para validar errores de  fk
class UsuariosController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  /*
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }
  
  */
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }
 
    $armador      =  auth()->user()->armador;
    $id_perfil      =  auth()->user()->perfil;

      /*BUSCA INFORMACION PARA EL USUARIO SUPER ADMIN*/ 
      if($id_perfil == 100)
      {
          $usuarios =    User::leftjoin('estados', 'estados.id', '=', 'users.estado')
                          ->leftjoin('perfiles', 'perfiles.id', '=', 'users.perfil')
                         ->select(
                                        'users.id as id',
                                        'users.name as name',
                                        'users.email as email',
                                        'perfiles.nombre as perfil',
                                        'estados.nombre as estado'
                             
                                        )
                                        ->get();
      }

      if($id_perfil == 2)
      {
          $usuarios =    User::leftjoin('estados', 'estados.id', '=', 'users.estado')
                        ->leftjoin('perfiles', 'perfiles.id', '=', 'users.perfil')
                        ->select(
                                  'users.id as id',
                                  'users.name as name',
                                  'users.email as email',
                                  'perfiles.nombre as perfil',
                                  'estados.nombre as estado'

                                 )
                       ->where('users.armador', '=', $armador)
                       ->get();
      }
 
                            

    //$usuarios = User::all()->except(Auth::user()->id);
    return view('usuarios.index', compact('usuarios'));
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


    $id_perfil       =  auth()->user()->perfil;
    $armador         =  auth()->user()->armador;

    if($id_perfil == 100)
    {
      $perfil       = Perfiles::all();
      $armadores    = Armador::all()->where('estado', '=', 1);                                 
      $estado       = Estados::all();
          
      return view('usuarios.create', compact('armadores','estado','perfil'));

    }
  }
  

  public function store(Request $request)
  {
     
          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }

    $inputs               =   $request->all();
    $armador              =   auth()->user()->armador;
    $perfil_usuario       =   auth()->user()->perfil;
    $id_usuario           =   auth()->user()->id;

    $inputs['name'] = strtoupper($inputs['name']);

    //if((auth()->user()->armador) == 100){$armador =$inputs['armador'];} //si armador es 100(superadmin) el armador debe ser valor ingresado
    $check        =   User::where('email',$inputs['email'])->where('armador','=',$armador)->exists();// busca si el correo ya esta creado en el mismo armador seleccionado anteriormente




    if($check){
                return redirect()->back()->with([
                                                'alert'   => 'Error!',
                                                'message' => 'El Usuario con el correo que intenta crear ya existe',
                                                'type'    => 'error'
                                            ]);
              }else{
                                  
                        if($perfil_usuario=100)
                        { 
                          $user=new User;
                          $user->name           =  $inputs['name'];
                          $user->email          =  $inputs['email'];
                          $user->password       =  Hash::make($inputs['password']);
                          $user->armador        =  $inputs['armador'];
                          $user->perfil         =  $inputs['perfil'];
                          $user->estado         =  $inputs['estado'];
                          $user->id_usuario_c   =  $id_usuario;
                          $user->save();

                          return redirect()->back()->with(['alert' => 'Correcto!','message'=>'Dato guardado correctamente!','type'=>'success']);
                        }
                    }



  }
  

  public function edit(User $user)
  {

          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }
  
    $id_perfil      =  auth()->user()->perfil;
    $armador         =  auth()->user()->armador;

    if($id_perfil == 100){$perfil = Perfiles::all();}



    $armadores    = Armador::all();
    //$embarcacion  = embarcacion::where('armador','=',$armador)->get();





    $estado       = Estados::all();
    return view('usuarios.edit',compact('user','estado','armadores','perfil'));
  }
  
  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\User  $user
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, User $user)
  {

      // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }

          $id_usuario         =   auth()->user()->id;
          $perfil_usuario     =   auth()->user()->perfil;
          $armador            =   auth()->user()->armador;
          $inputs             =   $request->all();
          $inputs             =   array_map("strtoupper", $inputs);

          if($perfil_usuario == 100 )
          {
        
          $check        =   User::where('email',$inputs['email'])->where('id','!=',$inputs['id'])->where('armador','=',$armador)->exists();
          $validador    =   user::where('armador',$armador)->where('id','=',$inputs['id'])->exists();
          
         // if ( $inputs['estado'] ==1   &&  $inputs['perfil'] == 1  ){return redirect()->back()->with(['alert' => 'Error!','message' => 'No se asoció un barco al usuario','type' => 'error']);}
          
   
    
      

          if($check){
                    return redirect()->back()->with([
                                                    'alert'   => 'Error!',
                                                    'message' => 'El Usuario que intenta modificar ya existe',
                                                    'type'    => 'error'
                                                  ]);
                    }else{
                
                          if($perfil_usuario=100 ){ $armador= $inputs['armador_id']; }          

                          if($inputs['passwd'] != ''){ $user->password =   $inputs['passwd'] = Hash::make($inputs['passwd']); }
                              
                            $user->name           =  $inputs['name'];
                            $user->armador        =  $armador;
                            $user->perfil         =  $inputs['perfil'];
                            $user->estado         =  $inputs['estado'];
                            $user->id_usuario_m   =  $id_usuario;
                            $user->save();
                            return redirect()->back()->with(['alert' => 'Correcto!','message'=>'Dato actualizado correctamente!','type'=>'success']);
                        }
    }
    return redirect()->back()->with([
                                    'alert' => 'Error!',
                                    'message' => 'Lo sentimos, no tiene los permisos necesarios para modificar registros de otro usuario. Por favor, contacte al administrador del sistema si necesita asistencia',
                                    'type' => 'error'
                                  ]);



  }
  

  public function destroy(User $user)
  {

  
      // Verificar si el usuario está autenticado
      if (!auth()->check()) {
        // Redireccionar al inicio de sesión u otra página según corresponda
        return redirect()->route('login');
    }

      try{
        $user->delete();
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
                                                        'message' => 'Lo siento, no se puede eliminar el usuario porque está relacionada con otros datos del sistema y la eliminación podría afectar la integridad de esos datos..',
                                                        'type' => 'error'
                                                    ]);
                }else{
                      return redirect()->back()->with([
                                                          'alert' => 'Error!',
                                                          'message' => 'Ocurrió un error al eliminar el usuario.',
                                                          'type' => 'error'
                                                      ]);
                    }
        }



  }
}

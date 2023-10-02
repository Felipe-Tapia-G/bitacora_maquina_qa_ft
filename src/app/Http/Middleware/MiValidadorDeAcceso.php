<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\Http\Request;
/*
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
*/





class MiValidadorDeAcceso
{
    public function handle($request, Closure $next)
    {
       
          // Verificar si el usuario está autenticado
          if (!auth()->check()) {
            // Redireccionar al inicio de sesión u otra página según corresponda
            return redirect()->route('login');
        }


        if ((auth()->user()->perfil != 100 && auth()->user()->perfil != 2 && auth()->user()->perfil != 1) || auth()->user()->estado == 0) {
          //  return redirect('/');


          return redirect('/bitacora_maquina')
          ->with([
             'alert' => 'Error!',
             'message' => 'Lo sentimos, no tienes acceso para acceder a esta petición. Si crees que esto es un error, por favor, contacta al super administrador del sistema para obtener más información. Gracias por tu comprensión.',
             'type' => 'error'
          ]);


        }else{
            return $next($request);
         }


   
      //  return $next($request);
    }
}
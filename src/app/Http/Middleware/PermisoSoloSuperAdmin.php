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





class PermisoSoloSuperAdmin
{
    public function handle($request, Closure $next)
    {
       


        if ((auth()->user()->perfil != 100 ) || auth()->user()->estado == 0) {
      


          return redirect('/bitacora_maquina')
          ->with([
             'alert' => 'Error!',
             'message' => 'Lo sentimos, no tienes acceso para acceder a esta petición. Si crees que esto es un error, por favor, contacta al super administrador del sistema para obtener más información. Gracias por tu comprensión.',
             'type' => 'error'
          ]);


        }else{
            return $next($request);
         }



    }
}
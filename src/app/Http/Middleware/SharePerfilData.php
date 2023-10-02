<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Perfiles;

class SharePerfilData
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $perfil = Perfiles::find($user->perfil);

            if ($perfil) {
                View::share('perfil', $perfil);
            }
        }

        return $next($request);
    }
}
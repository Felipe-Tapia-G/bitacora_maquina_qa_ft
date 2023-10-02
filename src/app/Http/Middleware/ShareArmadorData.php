<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Armador;

class ShareArmadorData
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $armador = Armador::find($user->armador);

            if ( $armador) {
                View::share('armador', $armador);
            }
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventPasswordReset
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
{
    if ($request->is('password/reset') && $request->isMethod('get')) {
         //abort(404);
        return redirect('/'); // Redirige a la ruta que desees
    }

    return $next($request);
}
}
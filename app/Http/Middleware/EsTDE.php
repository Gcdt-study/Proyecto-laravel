<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EsTDE
{
    public function handle(Request $request, Closure $next)
    {
        // Si el usuario NO tiene profesor asociado o NO es TDE → fuera
        if (!auth()->user()->profesor || !auth()->user()->profesor->es_tde) {
            abort(403, 'Acceso no autorizado');
        }

        return $next($request);
    }
}

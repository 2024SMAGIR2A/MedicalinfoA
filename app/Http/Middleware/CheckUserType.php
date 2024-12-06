<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next, $type)
    {
        $user = Auth::user();

        // Vérifie si l'utilisateur est authentifié et si son type correspond
        if (!auth()->check() || auth()->user()->type !== $type) {
            abort(403, 'Accès refusé'); // Retourne une erreur 403 si le type ne correspond pas
        }


        return $next($request);
    }
}

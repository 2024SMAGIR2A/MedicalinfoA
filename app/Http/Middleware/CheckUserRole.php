<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user(); // Récupérer l'utilisateur authentifié

        // Vérifiez si l'utilisateur a le rôle spécifique
        if (!$user || !$user->hasRole($role)) {
            // Rediriger vers une page d'erreur ou une autre page si l'utilisateur n'a pas le bon rôle
            return redirect('/home')->with('error', 'Accès non autorisé.');
        }

        return $next($request); // Si l'utilisateur a le rôle, on continue la requête
    }
}

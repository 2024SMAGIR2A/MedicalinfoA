<?php

namespace App\Http\Controllers\Auth;

use App\Models\Personne;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    /**
     * Utiliser le champ "username" pour l'authentification.
     */
    protected function username()
    {
        return 'username';
    }

    /**
     * Redirection après connexion.
     */
    protected function redirectTo()
    {
        $user = auth()->user();

        // Rediriger selon le type d'utilisateur
        switch ($user->type) {
            case 'Administrateur':
                return '/admin/dashboard';
            case 'AssistanteMedicale':
                return '/assistant/dashboard';
            case 'Medecin':
                return '/medecin/dashboard';
            case 'Patient':
                return '/patient/dashboard';
            default:
                return '/home'; // Redirection par défaut
        }
    }

    /**
     * Authentifier un utilisateur.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Récupérer l'utilisateur par username
        $user = Personne::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // Si l'utilisateur n'existe pas ou si le mot de passe est incorrect
            throw ValidationException::withMessages([
                'username' => __('Les identifiants ne correspondent pas à nos enregistrements.'),
            ]);
        }

        // Authentifier l'utilisateur
        Auth::login($user);

        // Redirection en fonction du type d'utilisateur
        return redirect($this->redirectTo());
    }

    /**
     * Action après authentification réussie.
     */
    protected function authenticated(Request $request, $user)
    {
        // Optionnel : Actions supplémentaires après connexion
        // Par exemple : Loguer l'activité ou mettre à jour un champ
    }
}

<?php

namespace App\Http\Controllers\Auth;
use App\Models\Personne;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Ajouter cette ligne pour importer Request
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// app/Http/Controllers/Auth/LoginController.php
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redéfinir la méthode username pour utiliser 'username' au lieu de 'email'
    protected function username()
    {
        //dd(request()->all()); // Vérifiez toutes les données envoyées dans la requête

        return 'username'; // Utiliser 'username' pour l'authentification
    }

    // Définir où l'utilisateur sera redirigé après la connexion
    protected function redirectTo()
{
    $user = auth()->user();

    // Si l'utilisateur est médecin
    if ($user->type === 'Administrateur') {
        return '/admin/dashboard';
    }

    // Si l'utilisateur est patient
    if ($user->type === 'AssistanteMedicale') {
        return '/assistant/dashboard';
    }

    // Si l'utilisateur est médecin
    if ($user->type === 'Medecin') {
        return '/medecin/dashboard';
    }

    // Si l'utilisateur est patient
    if ($user->type === 'Patient') {
        return '/patient/dashboard';
    }

    return '/home';  // Redirection par défaut
}


    // Dans LoginController.php

protected function authenticated(Request $request, $user)
{
    //dd($user); // Vérifie les données de l'utilisateur après la connexion réussie
}




// Dans LoginController.php
/*
public function login(Request $request)
{
    // Valider la requête
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Vérifiez si l'utilisateur existe
    $user = \App\Models\Personne::where('username', $request->username)->first();
    if (!$user) {
        dd('Utilisateur introuvable');
    }

    // Vérifiez si le mot de passe correspond
    if (!Hash::check($request->password, $user->password)) {
        //dd('Mot de passe incorrect', $request->password, $user->password);
        //dd("user mot de passe en base ", $user->password);
            // Récupérer le mot de passe crypté de l'utilisateur
    $passwordInDatabase = $user->password;

    // Afficher le mot de passe saisi par l'utilisateur
    $passwordEntered = $request->password;

    $rehasedPassword = Hash::make($request->password);

    // Vérifier si le mot de passe saisi correspond au mot de passe crypté en base
    $passwordMatches = Hash::check($passwordEntered, $passwordInDatabase);

    // Afficher les informations pour déboguer
    dd(
        'Mot de passe en base : ' . $passwordInDatabase,  // Mot de passe crypté en base
        'Mot de passe saisi : ' . $passwordEntered,       // Mot de passe saisi par l'utilisateur
        'Mot de passe saisi rehasher : ' . $rehasedPassword,       // Mot de passe saisi par l'utilisateur
        'Les mots de passe correspondent : ' . ($passwordMatches ? 'Oui' : 'Non')  // Résultat de la comparaison
    );
    }


    // Tentative d'authentification
    if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
        return redirect()->intended($this->redirectPath());
    }

    return back()->withErrors([
        'username' => 'These credentials do not match our records.',
    ]);
}
*/


/*public function login(Request $request)
{
    // Valider la requête
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Vérifiez si l'utilisateur existe
    $user = \App\Models\Personne::where('username', $request->username)->first();
    if (!$user) {
        dd('Utilisateur introuvable');
    }

    // Vérification du mot de passe avec bcrypt
    $passwordInDatabase = $user->password;
    $passwordEntered = $request->password;

    // Re-hacher le mot de passe saisi et le comparer
    if (!bcrypt($passwordEntered) === $passwordInDatabase) {
        dd('Mot de passe incorrect');
    }

    // Si le mot de passe est correct, on connecte l'utilisateur

    auth()->login($user);


    return redirect()->intended($this->redirectPath());
}
*/



public function login(Request $request)
{
    // Valider la requête
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Vérifiez si l'utilisateur existe
    $user = \App\Models\Personne::where('username', $request->username)->first();
    if (!$user) {
        //dd('Utilisateur introuvable');
        return '/home';  // Redirection par défaut
    }

    // Vérification du mot de passe avec Hash::check
    $passwordInDatabase = $user->password;
    $passwordEntered = $request->password;

    // Vérification si le mot de passe saisi correspond au mot de passe crypté en base

    // Affiche les valeurs pour vérifier ce qui se passe
/*dd(
    'Mot de passe saisi : ' . $request->password,
    'Mot de passe en base : ' . $user->password,
    'Vérification : ' . (Hash::check($request->password, $user->password) ? 'OK' : 'Échec')
);*/

/*
    if (!Hash::check($passwordEntered, $passwordInDatabase)) {

    }
*/
    if(Hash::check($passwordEntered, $passwordInDatabase)){
        auth()->login($user);
        return redirect()->intended($this->redirectPath());
    }else{
        //dd('Mot de passe incorrect');
      //return view('welcom');
        return '/home';  // Redirection par défaut
    };

    //$userRole = $user->user()->first()->role;  // Exemple pour obtenir le rôle lié
    //dd('Rôle de l\'utilisateur : ' . $userRole); // Affiche le rôle associé

    //dd($user);
    // Si le mot de passe est correct, on connecte l'utilisateur



}






}

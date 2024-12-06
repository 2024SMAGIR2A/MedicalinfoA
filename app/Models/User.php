<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;  // Correct import for DB
use Spatie\Permission\Models\Role;

class User extends Personne
{


    protected $fillable = ['personne_id'];  // Personne_id pour lier à la table 'personnes'

    public function personne()
    {
        return $this->belongsTo(Personne::class); // Relation avec le modèle Personne
    }

    // Cette méthode permet de définir 'username' pour l'authentification
    public function getAuthIdentifierName()
    {
        return 'username'; // Utiliser 'username' pour l'authentification
    }

     // Relation pour lier les utilisateurs aux rôles
         // Relation pour lier les utilisateurs aux rôles

// Récupérer le rôle de l'utilisateur en fonction du username
// Fonction pour récupérer le rôle d'un utilisateur par son username
public static function getRoleByUsername($username)
{
    // Effectuer une jointure entre les tables 'personnes' et 'users' pour récupérer le rôle
    return DB::table('users')
        ->join('personnes', 'personnes.id', '=', 'users.personne_id')
        ->where('personnes.username', $username)
        ->value('users.role');  // Retourner le rôle
}


// Relation pour lier les utilisateurs aux rôles
public function role()
{
    return $this->belongsTo(Role::class);  // Si vous avez une table 'roles' pour les rôles
}

}

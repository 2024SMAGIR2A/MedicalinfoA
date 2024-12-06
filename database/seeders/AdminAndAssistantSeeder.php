<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Personne;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class AdminAndAssistantSeeder extends Seeder
{
    public function run()
    {
        // Créer un rôle Administrateur si non existant
        // $adminRole = Role::firstOrCreate(['name' => 'Administrateur']);


        // Créer un rôle Assistante Médicale si non existant
        // $assistantRole = Role::firstOrCreate(['name' => 'Assistante Médicale']);

        // Créer des administrateurs et assistantes médicales avec des noms ivoiriens
        $this->createUser('Kouadio', 'Jean', 'admin.kouadio@exemple.ci', 'admin.kouadio', 'Local@12345', "Administrateur");
        $this->createUser('Bamba', 'Awa', 'assistante.bamba@exemple.ci', 'assistant.bamba', 'Local@12345', "Assistante Médicale");
    }

    /**
     * Méthode pour créer un utilisateur avec un rôle spécifique.
     *
     * @param string $nom
     * @param string $prenom
     * @param string $email
     * @param string $username
     * @param string $password
     * @param \Spatie\Permission\Models\Role $role
     * @return void
     */
    private function createUser($nom, $prenom, $email, $username, $password, $role)
    {
        // Créer une personne associée à cet utilisateur
        $personne = Personne::create([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'username' => $username, // Ajouter un username unique
            'password' => $password, // Crypter le mot de passe
            'type' => 'User', // Définir le type comme 'User'
        ]);

        // Créer un utilisateur avec un rôle
        $user = User::create([
            'personne_id' => $personne->id, // Référence à la personne
            'role' => $role->name, // Exemple : 'Administrateur' ou 'Assistante Médicale'
        ]);

        // Assigner le rôle à l'utilisateur
        $user->assignRole($role);
    }
}

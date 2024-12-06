<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Medecin;
use App\Models\Personne;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class RoleAssignmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_role_is_assigned_to_user()
    {
        // Créer un rôle
        $role = Role::create(['name' => 'Administrateur']);

        // Créer une personne associée à un utilisateur
        $personne = Personne::create([
            'nom' => 'Admin',
            'prenom' => 'Test',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'type' => 'User', // Type défini comme 'User'
        ]);

        // Créer un utilisateur lié à la personne
        $user = User::create([
            'personne_id' => $personne->id, // Référence à la personne
            'role' => 'admin', // Exemple de rôle
        ]);

        // Assigner le rôle à l'utilisateur
        $user->assignRole('Administrateur');

        // Vérifier que l'utilisateur a bien le rôle 'Administrateur'
        $this->assertTrue($user->hasRole('Administrateur'));

        // Vérifier que la table `model_has_roles` contient bien l'entrée
        $this->assertDatabaseHas('model_has_roles', [
            'model_id' => $user->id,
            'model_type' => 'App\\Models\\User',
            'role_id' => $role->id,
        ]);
    }



    /** @test */
    public function test_role_is_not_assigned_to_medecin()
    {
        // Créer une personne associée au médecin
        $personne = \App\Models\Personne::create([
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'email' => 'jean.dupont@example.com',
            'password' => bcrypt('password'),
            'type' => 'Medecin', // Définit que c'est un médecin
        ]);

        // Créer un médecin lié à cette personne
        $medecin = \App\Models\Medecin::create([
            'personne_id' => $personne->id, // Référence à la personne
            'specialite' => 'Cardiologue', // Exemple de spécialité
        ]);

        // Vérifier que la table `model_has_roles` ne contient pas cette entrée
        $this->assertDatabaseMissing('model_has_roles', [
            'model_id' => $medecin->id, // Vérifie que le médecin n'a pas de rôle
            'model_type' => 'App\\Models\\Medecin',
        ]);
    }




}

<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use App\Models\AssistanteMedicale;
use Illuminate\Database\Seeder;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\User;
use App\Models\Personne;
use Spatie\Permission\Models\Role;

class TestAccountsSeeder extends Seeder
{
    public function run()
    {
        $password = 'Local@12345'; // Mot de passe sécurisé

        // Créer un rôle pour l'administrateur et l'assistante médicale si nécessaire
        $adminRole = Role::firstOrCreate(['name' => 'Administrateur']);
        $assistantRole = Role::firstOrCreate(['name' => 'AssistanteMedicale']);
        $medecinRole = Role::firstOrCreate(['name' => 'Medecin']);
        $patientRole = Role::firstOrCreate(['name' => 'Patient']);

        // Créer une personne pour le médecin
        $medecinPersonne = Personne::create([
            'nom' => 'Ouattara',
            'prenom' => 'Jean',
            'email' => 'medecin@medical-info.ci',
            'username' => 'medecin', // Ajouter un username unique
            'password' => $password,
            'type' => 'Medecin',
        ]);
        $medecin = Medecin::create([
            'personne_id' => $medecinPersonne->id,
            'specialite' => 'Cardiologie',
        ]);
        $medecinPersonne->assignRole($medecinRole);  // Assigner le rôle "Medecin"

        // Créer une personne pour le patient
        $patientPersonne = Personne::create([
            'nom' => 'Traoré',
            'prenom' => 'Fatou',
            'email' => 'patient@medical-info.ci',
            'username' => 'patient.fatou', // Ajouter un username unique
            'password' => $password,
            'type' => 'Patient',
        ]);
        $patient = Patient::create([
            'personne_id' => $patientPersonne->id,
            'groupe_sanguin' => 'A+',
            'adresse' => 'Abidjan, Côte d\'Ivoire',
        ]);
        $patientPersonne->assignRole($patientRole);  // Assigner le rôle "Patient"

        // Créer un utilisateur pour l'administrateur
        $adminPersonne = Personne::create([
            'nom' => 'Kouassi',
            'prenom' => 'Marie',
            'email' => 'admin@medical-info.ci',
            'username' => 'admin.marie', // Ajouter un username unique
            'password' => $password,
            'type' => 'Administrateur',
        ]);
        $admin = Administrateur::create([
            'personne_id' => $adminPersonne->id,
        ]);
        $adminPersonne->assignRole($adminRole);  // Assigner le rôle "Administrateur"

        // Créer un utilisateur pour l'assistante médicale
        $assistantPersonne = Personne::create([
            'nom' => 'Bamba',
            'prenom' => 'Awa',
            'email' => 'assistante@medical-info.ci',
            'username' => 'assistant.awa', // Ajouter un username unique
            'password' => $password,
            'type' => 'AssistanteMedicale',
        ]);
        $assistant = AssistanteMedicale::create([
            'personne_id' => $assistantPersonne->id,
        ]);
        $assistantPersonne->assignRole($assistantRole);  // Assigner le rôle "Assistante Médicale"

        $this->command->info('Comptes de test créés avec succès !');
    }
}

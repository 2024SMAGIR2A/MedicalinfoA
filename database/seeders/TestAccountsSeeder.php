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

                // Créer des rôles si nécessaires
        $adminRole = Role::firstOrCreate(['name' => 'Administrateur']);
        $assistantRole = Role::firstOrCreate(['name' => 'AssistanteMedicale']);
        $medecinRole = Role::firstOrCreate(['name' => 'Medecin']);
        $patientRole = Role::firstOrCreate(['name' => 'Patient']);





        // Créer une personne pour le médecin
     // Créer une personne pour le médecin
        $medecinPersonne = Personne::create([
            'nom' => 'Ouattara',
            'prenom' => 'Jean',
            'email' => 'medecin@medical-info.ci',
            'username' => 'medecin', // Username unique
            'password' => $password,
            'telephone' => '0123456789',
            'date_naissance' => '1980-05-20',
            'type' => 'Medecin',
        ]);
        $medecin = Medecin::create([
            'personne_id' => $medecinPersonne->id,
            'matricule' => 'MED001',
            'specialite' => 'Cardiologie',
        ]);
        $medecinPersonne->assignRole($medecinRole);  // Assigner le rôle "Medecin"






       // Créer une personne pour le patient
       $patientPersonne = Personne::create([
        'nom' => 'Traoré',
        'prenom' => 'Fatou',
        'email' => 'patient@medical-info.ci',
        'username' => 'patient.fatou', // Username unique
        'password' => $password,
        'telephone' => '0987654321',
        'date_naissance' => '1995-03-12',
        'type' => 'Patient',
    ]);
    $patient = Patient::create([
        'personne_id' => $patientPersonne->id,
        'matricule' => 'PAT001',
        'profession' => 'Comptable',
        'statut_matrimonial' => 'Célibataire',
        'serologie' => 'HIV Négatif',
        'groupe_sanguin' => 'A+',
        'contact_urgence' => '0456789012',
        'date_naissance' => '1995-03-12',
        'ville' => 'Abidjan',
        'quartier' => 'Cocody',
    ]);
    $patientPersonne->assignRole($patientRole);  // Assigner le rôle "Patient"






 // Créer une personne pour l'administrateur
 $adminPersonne = Personne::create([
    'nom' => 'Kouassi',
    'prenom' => 'Marie',
    'email' => 'admin@medical-info.ci',
    'username' => 'admin.marie', // Username unique
    'password' => $password,
    'telephone' => '0678901234',
    'date_naissance' => '1985-10-05',
    'type' => 'Administrateur',
]);
$admin = Administrateur::create([
    'personne_id' => $adminPersonne->id,
]);
$adminPersonne->assignRole($adminRole);  // Assigner le rôle "Administrateur"





// Créer une personne pour l'assistante médicale
$assistantPersonne = Personne::create([
    'nom' => 'Bamba',
    'prenom' => 'Awa',
    'email' => 'assistante@medical-info.ci',
    'username' => 'assistant.awa', // Username unique
    'password' => $password,
    'telephone' => '0891234567',
    'date_naissance' => '1992-07-15',
    'type' => 'AssistanteMedicale',
]);
$assistant = AssistanteMedicale::create([
    'personne_id' => $assistantPersonne->id,
    'matricule' => 'ASM001',
]);
$assistantPersonne->assignRole($assistantRole);  // Assigner le rôle "Assistante Médicale"

$this->command->info('Comptes de test créés avec succès !');
}


}

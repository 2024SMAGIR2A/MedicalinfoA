<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrateur;
use App\Models\AssistanteMedicale;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Personne;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

class TestUsersSeeder extends Seeder
{
    public function run()
    {
        $password = 'Local@12345'; // Mot de passe sécurisé
        $faker = Faker::create('fr_FR'); // Utiliser Faker pour des données réalistes

        // Créer des rôles si nécessaires
        $adminRole = Role::firstOrCreate(['name' => 'Administrateur']);
        $medecinRole = Role::firstOrCreate(['name' => 'Medecin']);
        $patientRole = Role::firstOrCreate(['name' => 'Patient']);
        $assistantRole = Role::firstOrCreate(['name' => 'AssistanteMedicale']);

        // Générer 5 administrateurs
        for ($i = 2; $i <= 5; $i++) {
            $adminPersonne = Personne::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => 'admin' . $i . '@medical-info.ci',
                'username' => 'admin' . $i,
                'password' => $password,
                'telephone' => $faker->phoneNumber,
                'date_naissance' => $faker->dateTimeBetween('-50 years', '-30 years')->format('Y-m-d'),
                'type' => 'Administrateur',
            ]);

            Administrateur::create([
                'personne_id' => $adminPersonne->id,
            ]);

            $adminPersonne->assignRole($adminRole);  // Assigner le rôle "Administrateur"
        }

        // Liste des spécialités
        $specialites = [
            'Cardiologie',
            'Neurologie',
            'Orthopédie',
            'Pédiatrie',
            'Gynécologie',
            'Dermatologie',
            'Ophtalmologie',
            'Chirurgie générale',
            'Radiologie',
            'Anesthésiologie',
            'Endocrinologie',
            'Gastro-entérologie',
            'Urologie',
            'ORL (Oto-rhino-laryngologie)',
            'Psychiatrie',
        ];

        // Générer 15 médecins
        for ($i = 2; $i <= 15; $i++) {
            $medecinPersonne = Personne::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => 'medecin' . $i . '@medical-info.ci',
                'username' => 'medecin' . $i,
                'password' => $password,
                'telephone' => $faker->phoneNumber,
                'date_naissance' => $faker->dateTimeBetween('-60 years', '-30 years')->format('Y-m-d'),
                'type' => 'Medecin',
            ]);

            Medecin::create([
                'personne_id' => $medecinPersonne->id,
                'matricule' => 'MED' . str_pad($i, 3, '0', STR_PAD_LEFT), // Ex : MED001
                'specialite' => $specialites[($i - 1) % count($specialites)], // Répartir les spécialités
            ]);

            $medecinPersonne->assignRole($medecinRole);  // Assigner le rôle "Medecin"
        }

        // Générer 20 patients
        for ($i = 2; $i <= 20; $i++) {
            $patientPersonne = Personne::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => 'patient' . $i . '@medical-info.ci',
                'username' => 'patient' . $i,
                'password' => $password,
                'telephone' => $faker->phoneNumber,
                'date_naissance' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'type' => 'Patient',
            ]);

            Patient::create([
                'personne_id' => $patientPersonne->id,
                'matricule' => 'PAT' . str_pad($i, 3, '0', STR_PAD_LEFT), // Ex : PAT001
                'profession' => $faker->jobTitle,
                'statut_matrimonial' => $faker->randomElement(['Marié', 'Célibataire', 'Divorcé']),
                'serologie' => $faker->randomElement(['HIV Négatif', 'HIV Positif']),
                'groupe_sanguin' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+']),
                'contact_urgence' => $faker->phoneNumber,
                'ville' => $faker->city,
                'quartier' => $faker->streetName,
            ]);

            $patientPersonne->assignRole($patientRole);  // Assigner le rôle "Patient"
        }

        // Générer 10 assistantes médicales
        for ($i = 2; $i <= 10; $i++) {
            $assistantPersonne = Personne::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => 'assistant' . $i . '@medical-info.ci',
                'username' => 'assistant' . $i,
                'password' => $password,
                'telephone' => $faker->phoneNumber,
                'date_naissance' => $faker->dateTimeBetween('-45 years', '-25 years')->format('Y-m-d'),
                'type' => 'AssistanteMedicale',
            ]);

            AssistanteMedicale::create([
                'personne_id' => $assistantPersonne->id,
                'matricule' => 'ASM' . str_pad($i, 3, '0', STR_PAD_LEFT), // Ex : ASM001
            ]);

            $assistantPersonne->assignRole($assistantRole);  // Assigner le rôle "Assistante Médicale"
        }

        $this->command->info('Comptes de test créés avec succès : 5 administrateurs, 15 médecins, 20 patients, et 10 assistantes médicales.');
    }
}

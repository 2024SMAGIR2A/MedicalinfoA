<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PatientAllergie;
use App\Models\Patient;
use App\Models\Allergie;
use App\Models\Medecin;
use Faker\Factory as Faker;

class PatientAllergiesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR'); // Générer des données réalistes

        // Récupérer tous les patients, allergies, et médecins existants
        $patients = Patient::all();
        $allergies = Allergie::all();
        $medecins = Medecin::all();

        if ($patients->isEmpty() || $allergies->isEmpty() || $medecins->isEmpty()) {
            $this->command->error('Veuillez peupler les tables patients, allergies, et medecins avant d\'exécuter ce seeder.');
            return;
        }

        // Créer 50 déclarations d'allergies fictives
        for ($i = 0; $i < 50; $i++) {
            $patient = $patients->random();
            $allergie = $allergies->random();
            $medecin = $medecins->random(); // Médecin déclarant

            PatientAllergie::create([
                'patient_id' => $patient->id,
                'allergie_id' => $allergie->id,
                'date_declaration' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'), // Date réaliste
                'declare_par' => $medecin->personne_id, // ID de la personne associée au médecin
            ]);
        }

        $this->command->info('Table patient_allergies peuplée avec succès.');
    }
}

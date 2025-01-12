<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Traitement;
use App\Models\LigneDeTraitement;
use App\Models\Consultation;
use App\Models\Medecin;
use Faker\Factory as Faker;

class TraitementsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR'); // Générer des données réalistes en français

        // Récupérer les consultations et médecins existants
        $consultations = Consultation::all();
        $medecins = Medecin::all();

        if ($consultations->isEmpty() || $medecins->isEmpty()) {
            $this->command->error('Veuillez peupler les tables consultations et medecins avant d\'exécuter ce seeder.');
            return;
        }

        // Générer 30 traitements
        foreach ($consultations->random(30) as $consultation) {
            $medecin = $medecins->random();

            $traitement = Traitement::create([
                'consultation_id' => $consultation->id,
                'statut' => $faker->randomElement(['En cours', 'Terminé']),
                'administre_by' => $medecin->personne_id,
                'duree' => $faker->numberBetween(7, 30), // Durée entre 7 et 30 jours
                'datePrescription' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'description' => $faker->randomElement([
                    'Traitement antipaludique',
                    'Traitement antibiotique pour infection',
                    'Traitement contre la fièvre typhoïde',
                    'Traitement pour hypertension artérielle',
                    'Traitement pour bronchite',
                ]),
            ]);

            // Générer des lignes de traitement
            $medicaments = [
                ['medicament' => 'Paracétamol', 'dosage' => '500 mg', 'frequence' => '3 fois par jour', 'instructions' => 'Après repas'],
                ['medicament' => 'Amoxicilline', 'dosage' => '1 g', 'frequence' => '2 fois par jour', 'instructions' => 'Avant repas'],
                ['medicament' => 'Ceftriaxone', 'dosage' => '1 g', 'frequence' => '1 injection par jour', 'instructions' => 'Injection intramusculaire'],
                ['medicament' => 'Quinine', 'dosage' => '300 mg', 'frequence' => '3 fois par jour', 'instructions' => 'Avec beaucoup d\'eau'],
                ['medicament' => 'Amlodipine', 'dosage' => '5 mg', 'frequence' => '1 fois par jour', 'instructions' => 'Prendre le matin'],
            ];

            foreach ($medicaments as $medicament) {
                if ($faker->boolean(50)) { // 50% de chance d'inclure un médicament
                    LigneDeTraitement::create([
                        'traitement_id' => $traitement->id,
                        'medicament' => $medicament['medicament'],
                        'dosage' => $medicament['dosage'],
                        'frequence' => $medicament['frequence'],
                        'instructions' => $medicament['instructions'],
                    ]);
                }
            }
        }

        $this->command->info('Tables traitements et ligne_de_traitements peuplées avec succès.');
    }
}

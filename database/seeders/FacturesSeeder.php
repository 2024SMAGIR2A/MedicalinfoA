<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facture;
use App\Models\LigneFacture;
use App\Models\Consultation;
use Faker\Factory as Faker;

class FacturesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR'); // Générer des données réalistes en français

        // Récupérer toutes les consultations existantes
        $consultations = Consultation::all();

        if ($consultations->isEmpty()) {
            $this->command->error('Veuillez peupler la table consultations avant d\'exécuter ce seeder.');
            return;
        }

        // Générer des factures pour certaines consultations
        foreach ($consultations->random(30) as $consultation) { // 30 factures aléatoires
            $facture = Facture::create([
                'consultation_id' => $consultation->id,
                'montant_total' => 0, // Sera calculé après l'ajout des lignes
                'date_facture' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            ]);

            // Générer des lignes de factures réalistes
            $total = 0;
            $services = [
                ['description' => 'Consultation générale', 'montant' => $faker->randomFloat(2, 5000, 15000)],
                ['description' => 'Échographie', 'montant' => $faker->randomFloat(2, 10000, 25000)],
                ['description' => 'Analyse sanguine', 'montant' => $faker->randomFloat(2, 8000, 20000)],
                ['description' => 'Prescription médicamenteuse', 'montant' => $faker->randomFloat(2, 3000, 10000)],
                ['description' => 'Radiologie', 'montant' => $faker->randomFloat(2, 20000, 50000)],
            ];

            foreach ($services as $service) {
                if ($faker->boolean(60)) { // 60% de chance d'inclure un service
                    LigneFacture::create([
                        'facture_id' => $facture->id,
                        'description' => $service['description'],
                        'montant' => $service['montant'],
                    ]);
                    $total += $service['montant'];
                }
            }

            // Mettre à jour le montant total de la facture
            $facture->update(['montant_total' => $total]);
        }

        $this->command->info('Table factures et ligne_factures peuplées avec succès.');
    }
}

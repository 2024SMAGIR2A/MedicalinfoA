<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmploiDuTemps;
use App\Models\MedecinCentreDeSante;
use Faker\Factory as Faker;

class EmploiDuTempsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR'); // Générer des données réalistes
        $medecinCentres = MedecinCentreDeSante::all();

        if ($medecinCentres->isEmpty()) {
            $this->command->error('Veuillez peupler la table medecin_centre_de_sante avant d\'exécuter ce seeder.');
            return;
        }

        // Générer des emplois du temps pour chaque médecin-centre
        foreach ($medecinCentres as $medecinCentre) {
            for ($i = 0; $i < rand(5, 10); $i++) { // Chaque médecin a entre 5 et 10 créneaux
                $date = $faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d');
                $heureDebut = $faker->time('H:i', '15:00'); // Plage horaire réaliste
                $heureFin = $faker->time('H:i', '18:00');

                EmploiDuTemps::create([
                    'medecin_centre_id' => $medecinCentre->id,
                    'date_consultation' => $date,
                    'heure_debut' => $heureDebut,
                    'heure_fin' => $heureFin,
                ]);
            }
        }

        $this->command->info('Table emploi_du_temps peuplée avec succès.');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedecinCentreDeSante;
use App\Models\Medecin;
use App\Models\CentreDeSante;

class MedecinCentreDeSanteSeeder extends Seeder
{
    public function run()
    {
        // Récupérer les médecins et les centres de santé existants
        $medecins = Medecin::all();
        $centres = CentreDeSante::all();

        if ($medecins->isEmpty() || $centres->isEmpty()) {
            $this->command->error('Veuillez peupler les tables medecins et centre_de_santes avant d\'exécuter ce seeder.');
            return;
        }

        // Associer chaque médecin à un ou plusieurs centres de santé
        foreach ($medecins as $medecin) {
            $assignedCentres = $centres->random(rand(1, 3)); // Chaque médecin peut travailler dans 1 à 3 centres
            foreach ($assignedCentres as $centre) {
                MedecinCentreDeSante::create([
                    'medecin_id' => $medecin->id,
                    'centre_de_sante_id' => $centre->id,
                ]);
            }
        }

        $this->command->info('Table medecin_centre_de_sante peuplée avec succès.');
    }
}

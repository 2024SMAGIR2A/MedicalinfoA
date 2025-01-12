<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Allergie;
use App\Models\CentreDeSante;
use App\Models\TypeExamen;

class AdditionalDataSeeder extends Seeder
{
    public function run()
    {
        // Peupler la table allergies
        $allergies = [
            ['name' => 'Allergie au pollen', 'niveauSeverite' => 'Léger'],
            ['name' => 'Allergie aux acariens', 'niveauSeverite' => 'Modéré'],
            ['name' => 'Allergie aux arachides', 'niveauSeverite' => 'Sévere'],
            ['name' => 'Allergie au lactose', 'niveauSeverite' => 'Modéré'],
            ['name' => 'Allergie aux fruits de mer', 'niveauSeverite' => 'Sévere'],
            ['name' => 'Allergie aux œufs', 'niveauSeverite' => 'Modéré'],
            ['name' => 'Allergie au latex', 'niveauSeverite' => 'Sévere'],
            ['name' => 'Allergie aux médicaments (pénicilline)', 'niveauSeverite' => 'Sévere'],
            ['name' => 'Allergie au blé (gluten)', 'niveauSeverite' => 'Modéré'],
            ['name' => 'Allergie aux fruits (bananes, kiwi)', 'niveauSeverite' => 'Modéré'],
            ['name' => 'Allergie aux insectes (piqûres)', 'niveauSeverite' => 'Sévere'],
            ['name' => 'Allergie à la poussière', 'niveauSeverite' => 'Léger'],
            ['name' => 'Allergie aux moisissures', 'niveauSeverite' => 'Modéré'],
            ['name' => 'Allergie aux protéines de lait', 'niveauSeverite' => 'Sévere'],
            ['name' => 'Allergie au soja', 'niveauSeverite' => 'Modéré'],
        ];

        foreach ($allergies as $allergie) {
            Allergie::create($allergie);
        }

        $this->command->info('Table allergies peuplée avec succès.');

        // Peupler la table centre_de_santes
        $centreDeSantes = [
            ['nom' => 'Centre Hospitalier Universitaire (CHU) de Cocody', 'telephone' => '0123456789', 'ville' => 'Abidjan', 'quartier' => 'Cocody'],
            ['nom' => 'Clinique Hôtel Dieu', 'telephone' => '0234567890', 'ville' => 'Abidjan', 'quartier' => 'Marcory'],
            ['nom' => 'Hôpital Général de Yopougon', 'telephone' => '0345678901', 'ville' => 'Abidjan', 'quartier' => 'Yopougon'],
            ['nom' => 'Hôpital de Bouaké', 'telephone' => '0456789012', 'ville' => 'Bouaké', 'quartier' => 'Air France'],
            ['nom' => 'Clinique Farah', 'telephone' => '0567890123', 'ville' => 'Abidjan', 'quartier' => 'Deux Plateaux'],
            ['nom' => 'Hôpital de Man', 'telephone' => '0678901234', 'ville' => 'Man', 'quartier' => 'Libreville'],
            ['nom' => 'Clinique Abobo Nord', 'telephone' => '0789012345', 'ville' => 'Abidjan', 'quartier' => 'Abobo'],
        ];

        foreach ($centreDeSantes as $centre) {
            CentreDeSante::create($centre);
        }

        $this->command->info('Table centre_de_santes peuplée avec succès.');

        // Peupler la table type_examens
        $typeExamens = [
            ['nom' => 'Radiologie'],
            ['nom' => 'Échographie'],
            ['nom' => 'IRM'],
            ['nom' => 'Scanner'],
            ['nom' => 'Analyse sanguine'],
            ['nom' => 'Test d’allergie'],
            ['nom' => 'Examen ophtalmologique'],
            ['nom' => 'Examen ORL'],
            ['nom' => 'Examen dermatologique'],
        ];

        foreach ($typeExamens as $examen) {
            TypeExamen::create($examen);
        }

        $this->command->info('Table type_examens peuplée avec succès.');
    }
}

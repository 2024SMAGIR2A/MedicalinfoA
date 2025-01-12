<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Examen;
use App\Models\TypeExamen;
use App\Models\Consultation;
use Faker\Factory as Faker;

class ExamensSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR'); // Générer des données réalistes en français
        $consultations = Consultation::all();
        $typesExamens = TypeExamen::all();

        if ($consultations->isEmpty() || $typesExamens->isEmpty()) {
            $this->command->error('Veuillez peupler les tables consultations et type_examens avant d\'exécuter ce seeder.');
            return;
        }

        // Liste de résultats réalistes
        $resultats = [
            'Analyse sanguine : Présence d\'anémie légère.',
            'Échographie abdominale : Calcul biliaire détecté.',
            'Test rapide de paludisme : Positif.',
            'Radiographie pulmonaire : Opacité suspecte au lobe inférieur droit.',
            'IRM cérébrale : Aucune anomalie détectée.',
            'Glycémie à jeun : Niveau normal.',
            'Test urinaire : Infection urinaire confirmée.',
            'Bilan lipidique : Hypercholestérolémie détectée.',
            'Test de grossesse : Positif.',
            'Électrocardiogramme : Arythmie légère détectée.',
        ];

        // Liste de remarques réalistes
        $remarques = [
            'Recommander un suivi médical pour évaluer l\'anémie.',
            'Orientation vers un chirurgien pour une éventuelle intervention.',
            'Traitement antipaludique prescrit immédiatement.',
            'Radiologue recommande une biopsie pour analyse approfondie.',
            'Pas d\'anomalie, suivi annuel conseillé.',
            'Niveau de glycémie satisfaisant, aucun traitement nécessaire.',
            'Antibiothérapie prescrite pour traiter l\'infection.',
            'Régime alimentaire adapté recommandé.',
            'Patient informé et référé à un gynécologue.',
            'Suivi cardiologique recommandé pour surveiller l\'arythmie.',
        ];

        // Générer des examens pour 30 consultations aléatoires
        foreach ($consultations->random(30) as $consultation) {
            $typeExamen = $typesExamens->random();

            Examen::create([
                'type_examen_id' => $typeExamen->id,
                'consultation_id' => $consultation->id,
                'resultats' => $faker->randomElement($resultats),
                'remarques' => $faker->randomElement($remarques),
            ]);
        }

        $this->command->info('Table examens peuplée avec succès avec des données réalistes.');
    }
}

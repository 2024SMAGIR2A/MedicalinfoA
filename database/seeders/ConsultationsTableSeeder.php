<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Medecin;
use Faker\Factory as Faker;

class ConsultationsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR'); // Générer des données réalistes en français

        // Récupérer tous les patients et médecins existants
        $patients = Patient::all();
        $medecins = Medecin::all();

        if ($patients->isEmpty() || $medecins->isEmpty()) {
            $this->command->error('Veuillez peupler les tables patients et medecins avant d\'exécuter ce seeder.');
            return;
        }

        // Liste de motifs réalistes
        $motifs = [
            'Fièvre persistante',
            'Douleurs abdominales',
            'Toux sèche et persistante',
            'Maux de tête intenses',
            'Consultation prénatale',
            'Douleur thoracique',
            'Éruption cutanée',
            'Fatigue inexpliquée',
            'Suivi hypertension artérielle',
            'Problème de vision',
        ];

        // Liste de diagnostics réalistes
        $diagnostics = [
            'Paludisme confirmé par test rapide.',
            'Infection urinaire détectée après analyse d’urine.',
            'Bronchite chronique diagnostiquée après auscultation.',
            'Migraine sévère nécessitant un traitement adapté.',
            'Grossesse à 20 semaines, suivi recommandé.',
            'Suspicion d’angine de poitrine, référé à un spécialiste.',
            'Dermatite atopique, traitement local prescrit.',
            'Fatigue due à une carence en fer, supplémentation nécessaire.',
            'Hypertension contrôlée, ajustement du traitement.',
            'Décollement de rétine suspecté, référé à un ophtalmologue.',
        ];

        // Liste de notes réalistes pour les médecins
        $notesMedecin = [
            'Prescrire un traitement antipaludique et conseiller le repos.',
            'Recommander une hydratation accrue et surveiller l’évolution.',
            'Prévoir une radiographie pulmonaire pour confirmation.',
            'Conseiller un suivi neurologique en cas de récidive.',
            'Informer sur l’importance des échographies mensuelles.',
            'Prescrire un ECG et envisager une hospitalisation si nécessaire.',
            'Éviter les allergènes identifiés et suivre le traitement topique.',
            'Recommander un complément en fer et revoir dans 2 semaines.',
            'Surveiller la pression artérielle et adapter le traitement.',
            'Référer au spécialiste pour une intervention d’urgence.',
        ];

        // Créer 50 consultations fictives
        for ($i = 0; $i < 50; $i++) {
            $patient = $patients->random();
            $medecin = $medecins->random();

            Consultation::create([
                'patient_id' => $patient->id,
                'medecin_id' => $medecin->id,
                'diagnostic' => $faker->randomElement($diagnostics),
                'status' => $faker->randomElement(['E', 'V']), // En cours ou Validé
                'motif' => $faker->randomElement($motifs),
                'notesMedecin' => $faker->randomElement($notesMedecin),
                'dateConsul' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'), // Date dans la dernière année
            ]);
        }

        $this->command->info('Table consultations peuplée avec succès.');
    }
}

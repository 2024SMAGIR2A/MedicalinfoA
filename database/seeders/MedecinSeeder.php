<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medecin;
use App\Models\Personne;
use Faker\Factory as Faker;

class MedecinSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Créer 5 médecins fictifs
        for ($i = 0; $i < 5; $i++) {
            // Créer une personne (Médecin)
            $personne = Personne::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'username' => $faker->unique()->userName, // Ajouter un username généré
                'password' => bcrypt('password'),
                'telephone' => $faker->phoneNumber,
                'date_naissance' => $faker->date,
                'type' => 'Medecin', // Définit que c'est un médecin
            ]);

            // Créer un médecin lié à la personne
            Medecin::create([
                'personne_id' => $personne->id, // Référence à la personne
                'specialite' => $faker->word, // Exemple : Cardiologue, Dentiste
            ]);
        }
    }
}

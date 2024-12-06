<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Personne;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Créer 10 patients fictifs
        for ($i = 0; $i < 10; $i++) {
            // Créer une personne (Patient)
            $personne = Personne::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'telephone' => $faker->phoneNumber,
                'date_naissance' => $faker->date,
                'type' => 'Patient', // Le type est seulement assigné à la personne
            ]);

            // Créer un patient lié à la personne
            Patient::create([
                'personne_id' => $personne->id,
                'groupe_sanguin' => $faker->randomElement(['A+', 'B+', 'O-', 'AB+']),
                'adresse' => $faker->address,
            ]);
        }
    }
}

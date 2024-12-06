<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Personne;

class UserSeeder extends Seeder
{
    public function run()
    {
        $personnes = Personne::where('type', 'User')->get();

        foreach ($personnes as $personne) {
            User::create([
                'personne_id' => $personne->id,
                'role' => 'admin',
            ])->assignRole('Administrateur');
        }
    }
}

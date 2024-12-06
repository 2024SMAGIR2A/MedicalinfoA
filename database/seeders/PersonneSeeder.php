<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonneSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Personne::factory(10)->create();
    }
}

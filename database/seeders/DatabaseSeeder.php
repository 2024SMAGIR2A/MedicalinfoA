<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    $this->call([
        //PersonneSeeder::class,
        //UserSeeder::class,
        //MedecinSeeder::class,
        //PatientSeeder::class,
        RolePermissionSeeder::class,
        TestAccountsSeeder::class
    ]);
}

}

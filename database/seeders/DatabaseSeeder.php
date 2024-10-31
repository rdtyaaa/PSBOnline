<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ReligionSeeder;
use Database\Seeders\ProvincesAndRegenciesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            // ReligionSeeder::class,
            UsersTableSeeder::class,
            // ProvinceSeeder::class,
            // RegencySeeder::class,

        ]);


    }
}

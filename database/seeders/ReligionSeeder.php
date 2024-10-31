<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReligionSeeder extends Seeder
{
    public function run()
    {
        $religions = [['name' => 'Islam'], ['name' => 'Kristen'], ['name' => 'Katolik'], ['name' => 'Hindu'], ['name' => 'Buddha'], ['name' => 'Konghucu']];

        foreach ($religions as $religion) {
            Religion::create($religion);
        }
    }
}

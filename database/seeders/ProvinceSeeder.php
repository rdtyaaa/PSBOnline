<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $provinces = [
            ['id' => 1, 'name' => 'Aceh'],
            ['id' => 2, 'name' => 'Sumatera Utara'],
            ['id' => 3, 'name' => 'Sumatera Barat'],
            ['id' => 4, 'name' => 'Riau'],
            ['id' => 5, 'name' => 'Kepulauan Riau'],
            ['id' => 6, 'name' => 'Jambi'],
            ['id' => 7, 'name' => 'Sumatera Selatan'],
            ['id' => 8, 'name' => 'Bengkulu'],
            ['id' => 9, 'name' => 'Lampung'],
            ['id' => 10, 'name' => 'DKI Jakarta'],
            ['id' => 11, 'name' => 'Jawa Barat'],
            // ['id' => 9, 'name' => 'Kepulauan Bangka Belitung'],
            ['id' => 12, 'name' => 'Jawa Tengah'],
            ['id' => 14, 'name' => 'Jawa Timur'],
            ['id' => 13, 'name' => 'DI Yogyakarta'],
            // ['id' => 16, 'name' => 'Banten'],
            ['id' => 15, 'name' => 'Bali'],
            ['id' => 16, 'name' => 'Nusa Tenggara Barat'],
            ['id' => 17, 'name' => 'Nusa Tenggara Timur'],
            // ['id' => 20, 'name' => 'Kalimantan Barat'],
            // ['id' => 21, 'name' => 'Kalimantan Tengah'],
            // ['id' => 22, 'name' => 'Kalimantan Selatan'],
            // ['id' => 23, 'name' => 'Kalimantan Timur'],
            // ['id' => 24, 'name' => 'Kalimantan Utara'],
            // ['id' => 25, 'name' => 'Sulawesi Utara'],
            // ['id' => 26, 'name' => 'Sulawesi Tengah'],
            // ['id' => 27, 'name' => 'Sulawesi Selatan'],
            // ['id' => 28, 'name' => 'Sulawesi Tenggara'],
            // ['id' => 29, 'name' => 'Gorontalo'],
            // ['id' => 30, 'name' => 'Sulawesi Barat'],
            ['id' => 18, 'name' => 'Maluku'],
            ['id' => 19, 'name' => 'Maluku Utara'],
            ['id' => 21, 'name' => 'Papua Barat'],
            ['id' => 20, 'name' => 'Papua'],
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}

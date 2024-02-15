<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'code'       => 'CB',
            'name'       => 'Cochabamba',
        ]);
        City::create([
            'code'       => 'SN',
            'name'       => 'Santa Cruz',
        ]);
        City::create([
            'code'       => 'LP',
            'name'       => 'La Paz',
        ]);
    }
}

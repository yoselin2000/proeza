<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agency;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agency::create([
            'code'       => 'CN',
            'name'       => 'Nacional',
            'city_id'      => '1'
        ]);
        Agency::create([
            'code'       => 'C00',
            'name'       => 'Cala Cala',
            'city_id'      => '1'
        ]);
        Agency::create([
            'code'       => 'C01',
            'name'       => 'El Paso',
            'city_id'      => '1'
        ]);
        Agency::create([
            'name'       => 'Punata',
            'code'       => 'C02',
            'city_id'      => '1'
        ]);
        Agency::create([
            'code'       => 'G00',
            'name'       => 'Casco Viejo',
            'city_id'      => '2'
        ]);
        Agency::create([
            'code'       => 'B00',
            'name'       => 'Rio Seco',
            'city_id'      => '3'
        ]);
    }
}

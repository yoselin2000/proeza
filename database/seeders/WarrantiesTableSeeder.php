<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warranty;


class WarrantiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warranty::create([
            'name'       => 'Hipotecaria',
        ]);
        Warranty::create([
            'name'       => 'PreHipoteca',
        ]);
        Warranty::create([
            'name'       => 'Custodia',
        ]);
        Warranty::create([
            'name'       => 'Otros',
        ]);
    }
}

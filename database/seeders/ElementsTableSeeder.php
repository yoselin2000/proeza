<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Element;
use Illuminate\Database\Seeder;

class ElementsTableSeeder extends Seeder
{
    public function run(): void
    {
        Element::create([
            'name'       => 'Inmueble',
        ]);
        Element::create([
            'name'       => 'Vehiculo',
        ]);
        Element::create([
            'name'       => 'Maquinaria',
        ]);
    }
}

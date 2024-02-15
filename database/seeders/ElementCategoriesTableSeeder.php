<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ElementCategory;
use Illuminate\Database\Seeder;

class ElementCategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        ElementCategory::create([
            'name'       => 'Computadora',
        ]);

        ElementCategory::create([
            'name'       => 'Impresora',
        ]);

        ElementCategory::create([
            'name'       => 'Camaras de seguridad',
        ]);

        ElementCategory::create([
            'name'       => 'Internet',
        ]);

        ElementCategory::create([
            'name'       => 'Celular',
        ]);

        ElementCategory::create([
            'name'       => 'Telefonia',
        ]);
    }
}

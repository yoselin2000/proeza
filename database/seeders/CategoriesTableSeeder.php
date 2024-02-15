<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'       => 'Deudor',
        ]);
        Category::create([
            'name'       => 'CoDeudor',
        ]);
        Category::create([
            'name'       => 'Garante',
        ]);
        Category::create([
            'name'       => 'CoGarante',
        ]);
    }
}

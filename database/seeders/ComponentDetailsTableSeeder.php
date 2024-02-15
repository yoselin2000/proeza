<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ComponentDetail;
use Illuminate\Database\Seeder;

class ComponentDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComponentDetail::create(['name' => 'Caroceria']);
        ComponentDetail::create(['name' => 'Llantas']);
        ComponentDetail::create(['name' => 'Acesorios (faroles, stop, etc.)']);
        ComponentDetail::create(['name' => 'Interiores (tablero, tapizado, etc.)']);
    }
}

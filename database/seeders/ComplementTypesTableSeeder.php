<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComplementType;

class ComplementTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ComplementType::create(['name' => 'Gastos Operativos']);
        ComplementType::create(['name' => 'Voluntad de Pago']);
    }
}

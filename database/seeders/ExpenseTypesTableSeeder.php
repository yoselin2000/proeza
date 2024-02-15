<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ExpenseType;
use Illuminate\Database\Seeder;

class ExpenseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $EAS = [
            [
                'name'      => 'Alimentación',
            ],
            [
                'name'      => 'Transporte familiar',
            ],
            [
                'name'      => 'Servicios básicos (luz, agua, teléfono y otros)',
            ],
            [
                'name'      => 'Serv. De Internet - TV cable -Teléfonos Cel.',
            ],
            [
                'name'      => 'Educación (material, recreos, pasajes y otros)',
            ],
            [
                'name'      => 'Vestimenta',
            ],
            [
                'name'      => 'Salud',
            ],
            [
                'name'      => 'Insumos de limpieza y Aseo',
            ],
            [
                'name'      => 'Alquileres',
            ],
            [
                'name'      => 'Impuestos Inmuebles familia',
            ],
            [
                'name'      => 'Gastos y mantenimiento de vehículos familia',
            ],
            [
                'name'      => 'Recreación',
            ],
            [
                'name'      => 'Imprevistos',
            ],
        ];

        foreach ($EAS as $EA) {
            ExpenseType::create([
                'name'      => $EA['name'],
            ]);
        }
    }
}

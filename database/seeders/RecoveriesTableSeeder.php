<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recovery;
use App\Models\Credit;

class RecoveriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $credits = Credit::pluck('id'); // Obtener todos los IDs de los créditos existentes

        for ($i = 0; $i < 50; $i++) {
            $recoveryData = [
                'fecha' => now()->subDays(rand(1, 365)), // Fecha aleatoria dentro del último año
                'saldoIni' => rand(100, 1000),
                'capital' => rand(50, 500),
                'interes' => rand(10, 100),
                'vencido' => rand(0, 1),
                'penal' => rand(0, 50),
                'diferido' => rand(0, 100),
                'seguro' => rand(0, 50),
                'cuotaTotal' => rand(200, 1000),
                'saldoFin' => rand(50, 500),
                'credit_id' => rand(50, 500), // Asignar un ID de crédito aleatorio
            ];

            Recovery::create($recoveryData);
        }
    }
}

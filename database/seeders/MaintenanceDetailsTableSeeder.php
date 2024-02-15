<?php

namespace Database\Seeders;
use App\Models\MaintenanceDetail;

use Illuminate\Database\Seeder;

class MaintenanceDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaintenanceDetail::create(['name' => 'Combustible']);
        MaintenanceDetail::create(['name' => 'Hoja de ruta, peaje']);
        MaintenanceDetail::create(['name' => 'Pago chofer']);
        MaintenanceDetail::create(['name' => 'Pago ayudante']);
        MaintenanceDetail::create(['name' => 'Cambio de aceite']);
        MaintenanceDetail::create(['name' => 'Cambio/remachado de frenos']);
        MaintenanceDetail::create(['name' => 'Alimentacion']);
        MaintenanceDetail::create(['name' => 'Aporte sindicato']);
        MaintenanceDetail::create(['name' => 'Cambio/remachado de embreague']);
        MaintenanceDetail::create(['name' => 'Cambio de llantas']);
        MaintenanceDetail::create(['name' => 'Cambio de bateria']);
        MaintenanceDetail::create(['name' => 'Rep, Gral, (motor, caja, corona, otros)']);
        MaintenanceDetail::create(['name' => 'Impuesto']);
        MaintenanceDetail::create(['name' => 'SOAT']);
        MaintenanceDetail::create(['name' => 'Roseta']);
        MaintenanceDetail::create(['name' => 'Seguros']);
        MaintenanceDetail::create(['name' => 'Lavado']);
        MaintenanceDetail::create(['name' => 'Otros']);
    }
}

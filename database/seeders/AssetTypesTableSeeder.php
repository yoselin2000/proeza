<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AssetType;
use Illuminate\Database\Seeder;

class AssetTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        $EAS = [
            [
                'name'      => 'Cuentas de Ahorro',
            ],
            [
                'name'      => 'Cuentas Corrientes',
            ],
            [
                'name'      => 'Depositos a Plazo fijo y/o Titulos Valores',
            ],
            [
                'name'      => 'Inmuebles Urbanos con Minuta',
            ],
            [
                'name'      => 'Inmuebles Urbanos con Registro',
            ],
            [
                'name'      => 'Inmuebles Rurales con Minuta',
            ],
            [
                'name'      => 'Inmuebles Rurales con Registro',
            ],
            [
                'name'      => 'Lote de Terreno con Minuta',
            ],
            [
                'name'      => 'Lote de Terreno con Registro',
            ],
            [
                'name'      => 'Vehiculos Actividad Principal',
            ],
            [
                'name'      => 'Vehiculos Actividad Secundaria',
            ],
            [
                'name'      => 'Vehiculos de la Familia',
            ],
            [
                'name'      => 'Muebles y Enseres del Hogar',
            ],
            [
                'name'      => 'Muebles Enseres y Herramientas Actividad Principal',
            ],
            [
                'name'      => 'Muebles Enseres y Herramientas Actividades Secundarias',
            ],
            [
                'name'      => 'Muebles Enseres y Herramientas Otras Actividades',
            ],
            [
                'name'      => 'Equipos electronicos y electrodomesticos del Hogar',
            ],
            [
                'name'      => 'Equipos electronicos Actividad Principal',
            ],
            [
                'name'      => 'Equipos electronicos Actividades Secundarias',
            ],
            [
                'name'      => 'Equipos electronicos Otras Actividades',
            ],
            [
                'name'      => 'Maquinaria y Equipos Actividad Principal',
            ],
            [
                'name'      => 'Maquinaria y Equipos Actividades Secundarias',
            ],
            [
                'name'      => 'Otros Equipos y Herramientas del Hogar',
            ],
            [
                'name'      => 'Efectivo del Negocio',
            ],
            [
                'name'      => 'Efectivo Segunda Actividad',
            ],
            [
                'name'      => 'Inventarios Actividad Principal',
            ],
            [
                'name'      => 'Inventarios Actividad Secundaria',
            ],
            [
                'name'      => 'Pagos Anticipados ',
            ],
            [
                'name'      => 'Cuentas por Cobrar ',
            ],
            [
                'name'      => 'Anticretico del Negocio',
            ],
            [
                'name'      => 'Anticretico de la Familia',
            ],
            [
                'name'      => 'Ahorro de la Familia',
            ],
            [
                'name'      => 'Puesto de Venta',
            ],
            [
                'name'      => 'Aporte Propio para Compra de Activos',
            ],
            [
                'name'      => 'Lineas y Acciones del negocio',
            ],
            [
                'name'      => 'Lineas y Acciones de la Familia',
            ],
            [
                'name'      => 'Semovientes Actividad Principal',
            ],
            [
                'name'      => 'Semovientes Actividad Secundaria',
            ],
            [
                'name'      => 'Semovientes Familiar',
            ],
        ];

        foreach ($EAS as $EA) {
            AssetType::create([
                'name'      => $EA['name'],
            ]);
        }
    }
}

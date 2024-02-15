<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'name'       => 'destino 1',
            'state'       => true,
        ]);
        Destination::create([
            'name'       => 'destino 2',
            'state'       => true,
        ]);
        Destination::create([
            'name'       => 'destino 3',
            'state'       => true,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name'       => 'Maria',
            'lastName'       => 'la del',
            'secondLastName'       => 'barri',
            'thirdLastName'       => 'CN',
            'gender'       => 'Masculino',
            'birth'       => '1994-07-09',
            'nacionality'       => 'CN',
            'identification'       => 'CN',
            'number'       => 54456456,
            'complement'       => 54658465,
            'extension'       => 'CN',
        ]);

        Client::create([
            'name'       => 'Carlos',
            'lastName'       => 'Perez',
            'secondLastName'       => 'Choque',
            'thirdLastName'       => 'CN',
            'gender'       => 'Masculino',
            'birth'       => '1994-07-09',
            'nacionality'       => 'CN',
            'identification'       => 'CN',
            'number'       => 46545645,
            'complement'       => 54658465,
            'extension'       => 'CN',
        ]);

        Client::create([
            'name'       => 'Francisco',
            'lastName'       => 'Sevila',
            'secondLastName'       => 'Lopez',
            'thirdLastName'       => 'CN',
            'gender'       => 'Masculino',
            'birth'       => '1994-07-09',
            'nacionality'       => 'CN',
            'identification'       => 'CN',
            'number'       => 787897878,
            'complement'       => 54658465,
            'extension'       => 'CN',
        ]);

        Client::create([
            'name'       => 'Natalia',
            'lastName'       => 'Justiniano',
            'secondLastName'       => 'Garcia',
            'thirdLastName'       => 'CN',
            'gender'       => 'Masculino',
            'birth'       => '1994-07-09',
            'nacionality'       => 'CN',
            'identification'       => 'CN',
            'number'       => 787278241,
            'complement'       => 54658465,
            'extension'       => 'CN',
        ]);

        Client::create([
            'name'       => 'Michel',
            'lastName'       => 'Nodal',
            'secondLastName'       => 'Turizo',
            'thirdLastName'       => 'CN',
            'gender'       => 'Masculino',
            'birth'       => '1994-07-09',
            'nacionality'       => 'CN',
            'identification'       => 'CN',
            'number'       => 12375687,
            'complement'       => 54658465,
            'extension'       => 'CN',
        ]);

        Client::create([
            'name'       => 'Carol',
            'lastName'       => 'Pereira',
            'secondLastName'       => 'Choque',
            'thirdLastName'       => 'CN',
            'gender'       => 'Masculino',
            'birth'       => '1994-07-09',
            'nacionality'       => 'CN',
            'identification'       => 'CN',
            'number'       => 78564537,
            'complement'       => 54658465,
            'extension'       => 'CN',
        ]);

        Client::create([
            'name'       => 'Xavier',
            'lastName'       => 'Parraga',
            'secondLastName'       => 'Quiros',
            'thirdLastName'       => 'CN',
            'gender'       => 'Masculino',
            'birth'       => '1994-07-09',
            'nacionality'       => 'CN',
            'identification'       => 'CN',
            'number'       => 876789453,
            'complement'       => 54658465,
            'extension'       => 'CN',
        ]);

    }
}

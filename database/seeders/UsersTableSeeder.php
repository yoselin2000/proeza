<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'       => 'Admin',
            'email'      => 'admin@gmail.com',
            'password'      => bcrypt('1234'),
            'agency_id'      => 1,
            'range_id'      => 1,
        ]);
        $admin->assignRole('admin');



        $user1 = User::create([
            'name'       => 'Ely',
            'email'      => 'user1@gmail.com',
            'password'      => bcrypt('1234'),
            'agency_id'      => 1,
            'range_id'      => 1,
        ]);
        $user1->assignRole('Operaciones');



        $user2 = User::create([
            'name'       => 'Juan Carlos',
            'email'      => 'user2@gmail.com',
            'password'      => bcrypt('1234'),
            'agency_id'      => 2,
            'range_id'      => 2,
        ]);
        $user2->assignRole('Encargado Sucursal');
        $user3 = User::create([
            'name'       => 'Erika',
            'email'      => 'user3@gmail.com',
            'password'      => bcrypt('1234'),
            'agency_id'      => 2,
            'range_id'      => 1,
        ]);
        $user3->assignRole('Asesor');



        $user4 = User::create([
            'name'       => 'Aracely',
            'email'      => 'user4@gmail.com',
            'password'      => bcrypt('1234'),
            'agency_id'      => 2,
            'range_id'      => 3,
        ]);
        $user4->assignRole('Encargado Sucursal');
        $user5 = User::create([
            'name'       => 'Diego',
            'email'      => 'user5@gmail.com',
            'password'      => bcrypt('1234'),
            'agency_id'      => 2,
            'range_id'      => 1,
        ]);
        $user5->assignRole('Asesor');

        $user5 = User::create([
            'name'       => 'martita',
            'email'      => 'user6@gmail.com',
            'password'      => bcrypt('1234'),
            'agency_id'      => 2,
            'range_id'      => 1,
        ]);
        $user5->assignRole('Talento humano');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Participant;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Participant::create([
            'client_id'       => 1,
            'application_id'       => 1,
            'category_id'       => 1,
        ]);
        Participant::create([
            'client_id'       => 2,
            'application_id'       => 1,
            'category_id'       => 2,
        ]);

        Participant::create([
            'client_id'       => 2,
            'application_id'       => 2,
            'category_id'       => 1,
        ]);
        Participant::create([
            'client_id'       => 3,
            'application_id'       => 3,
            'category_id'       => 1,
        ]);
        Participant::create([
            'client_id'       => 4,
            'application_id'       => 4,
            'category_id'       => 1,
        ]);
        Participant::create([
            'client_id'       => 5,
            'application_id'       => 5,
            'category_id'       => 1,
        ]);
        Participant::create([
            'client_id'       => 6,
            'application_id'       => 6,
            'category_id'       => 1,
        ]);
        Participant::create([
            'client_id'       => 7,
            'application_id'       => 7,
            'category_id'       => 1,
        ]);
        Participant::create([
            'client_id'       => 1,
            'application_id'       => 8,
            'category_id'       => 1,
        ]);
        Participant::create([
            'client_id'       => 2,
            'application_id'       => 9,
            'category_id'       => 1,
        ]);
        Participant::create([
            'client_id'       => 3,
            'application_id'       => 10,
            'category_id'       => 1,
        ]);
    }
}

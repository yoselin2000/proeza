<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evaluation;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evaluation::create([
            'civil'       => 'Soltera',
            'age'       => 27,
            'mobile'       => 6874646546,
            'landline'       => 352658464,
            'employment'       => 'Independiente',
            'participant_id'       => 1,
        ]);
    }
}

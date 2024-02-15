<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Range;

class RangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Range::create([
            'type'       => '0',
            'min'       => '0',
            'max'      => '0'
        ]);
        Range::create([
            'type'       => 'a',
            'min'       => '0',
            'max'      => '10980'
        ]);
        Range::create([
            'type'       => 'b',
            'min'       => '10980',
            'max'      => '25000'
        ]);
        Range::create([
            'type'       => 'c',
            'min'       => '25000',
            'max'      => '35000'
        ]);
        Range::create([
            'type'       => 'd',
            'min'       => '25000',
            'max'      => '35000'
        ]);
        Range::create([
            'type'       => 'e',
            'min'       => '35000',
            'max'      => '45000'
        ]);
        Range::create([
            'type'       => 'f',
            'min'       => '45000',
            'max'      => '70000'
        ]);
        Range::create([
            'type'       => 'g',
            'min'       => '70000',
            'max'      => '150000'
        ]);
    }
}

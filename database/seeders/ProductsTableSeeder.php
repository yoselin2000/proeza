<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name'       => 'Normal',
            'min'       => 0,
            'max'       => 10500,
            'currency'       => 'Bolivianos',
            'seg'       => 0.09,
            'int'       => 35.91,
            'ven'       => 0.1,
            'pen'       => 0.1,
            'dif'       => 0.1,
            'state'       => true,
        ]);
        Product::create([
            'name'       => 'Normal 2',
            'min'       => 0,
            'max'       => 10500,
            'currency'       => 'Bolivianos',
            'seg'       => 0.1762,
            'int'       => 35.82,
            'ven'       => 0.1,
            'pen'       => 0.1,
            'dif'       => 0.1,
            'state'       => true,
        ]);
    }
}

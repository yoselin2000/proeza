<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CompanyElement;
use Illuminate\Database\Seeder;

class CompanyElementsTableSeeder extends Seeder
{
    public function run(): void
    {
        CompanyElement::create([
            'element_category_id'   => '1',
            'name'                  => 'laptop',
        ]);

        CompanyElement::create([
            'element_category_id'   => '2',
            'name'                  => 'Impresora Matricial',
        ]);

        CompanyElement::create([
            'element_category_id'   => '1',
            'name'                  => 'Monitor',
        ]);

    }
}

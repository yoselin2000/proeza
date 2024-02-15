<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document::create([
            'name'       => 'Documento 1 Bien 1',
            'element_id' => '1',
        ]);
        Document::create([
            'name'       => 'Documento 2 Bien 1',
            'element_id' => '1',
        ]);
        Document::create([
            'name'       => 'Documento 3 Bien 1',
            'element_id' => '1',
        ]);
        
        Document::create([
            'name'       => 'Documento 1 Bien 2',
            'element_id' => '2',
        ]);
        Document::create([
            'name'       => 'Documento 2 Bien 2',
            'element_id' => '2',
        ]);
        Document::create([
            'name'       => 'Documento 3 Bien 2',
            'element_id' => '2',
        ]);
        
        Document::create([
            'name'       => 'Documento 1 Bien 3',
            'element_id' => '3',
        ]);
        Document::create([
            'name'       => 'Documento 2 Bien 3',
            'element_id' => '3',
        ]);
        Document::create([
            'name'       => 'Documento 3 Bien 3',
            'element_id' => '3',
        ]);
    }
}

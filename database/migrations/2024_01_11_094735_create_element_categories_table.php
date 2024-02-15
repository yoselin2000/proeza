<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('element_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('element_categories');
    }
};

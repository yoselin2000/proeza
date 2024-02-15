<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('state');

            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('component_detail_id');

            $table->timestamps();



            $table->foreign('vehicle_id')->references('id')->on('vehicles')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('component_detail_id')->references('id')->on('component_details')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};

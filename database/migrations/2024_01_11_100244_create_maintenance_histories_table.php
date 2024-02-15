<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenance_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('FEntry')->nullable();
            $table->date('FDeparture');
            $table->text('description');

            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->unsignedBigInteger('element_component_id');

            $table->timestamps();

            $table->foreign('assigned_to')->references('id')->on('assignments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('element_component_id')->references('id')->on('element_components')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance_histories');
    }
};

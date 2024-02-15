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
        Schema::create('average_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->double('well');
            $table->double('regular');
            $table->double('bad');

            $table->unsignedBigInteger('activity_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->timestamps();

            //relation
            $table->foreign('activity_id')->references('id')->on('activities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('average_sales');
    }
};

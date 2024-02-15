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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('detail');
            $table->integer('cant');
            $table->double('price');
            $table->double('total');
            $table->string('frequency');
            $table->double('month');
            $table->double('year');


            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('maintenance_detail_id');

            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('maintenance_detail_id')->references('id')->on('maintenance_details')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};

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
        Schema::create('transport_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('detail');
            $table->integer('num');
            $table->string('unit');
            $table->integer('number');
            $table->string('frequency');
            $table->double('price');
            $table->double('total');

            $table->unsignedBigInteger('transport_id');

            $table->timestamps();

            $table->foreign('transport_id')->references('id')->on('transports')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_details');
    }
};

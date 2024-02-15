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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('state');
            $table->string('brand');
            $table->string('plate');
            $table->string('color');
            $table->string('cylinder');
            $table->string('fuel');
            $table->integer('manufacturing');
            $table->string('soat');

            $table->unsignedBigInteger('activity_id');
            $table->timestamps();

            //relation
            $table->foreign('activity_id')->references('id')->on('activities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};

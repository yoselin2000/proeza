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
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('form');
            $table->string('specific');
            $table->string('profession');
            $table->string('responsable');
            $table->string('experience');
            $table->string('antiquity');
            $table->string('property');
            $table->unsignedBigInteger('evaluation_id');
            $table->unsignedBigInteger('caedec_id');
            $table->timestamps();

            //relation
            $table->foreign('evaluation_id')->references('id')->on('evaluations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('caedec_id')->references('id')->on('caedecs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

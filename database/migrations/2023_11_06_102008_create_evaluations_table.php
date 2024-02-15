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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('age');
            $table->string('civil');
            $table->string('mobile');
            $table->string('landline')->nullable();
            $table->string('employment');
            $table->unsignedBigInteger('participant_id');
            $table->timestamps();

            //relation
            $table->foreign('participant_id')->references('id')->on('participants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

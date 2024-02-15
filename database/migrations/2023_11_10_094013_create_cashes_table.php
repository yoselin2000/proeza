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
        Schema::create('cashes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('assessment');
            $table->date('buys');
            $table->double('real');
            
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
        Schema::dropIfExists('cashes');
    }
};

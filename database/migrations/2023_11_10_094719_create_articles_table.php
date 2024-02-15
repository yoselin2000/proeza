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
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('performance');
            $table->string('production');
            $table->double('buys')->nullable();
            $table->double('sale')->nullable();
            $table->double('mb')->nullable();

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
        Schema::dropIfExists('articles');
    }
};

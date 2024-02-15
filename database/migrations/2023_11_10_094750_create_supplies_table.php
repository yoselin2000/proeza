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
        Schema::create('supplies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('cant');
            $table->string('unit');
            $table->integer('performance');
            $table->double('price');
            $table->double('total');

            $table->unsignedBigInteger('article_id');

            $table->timestamps();

            $table->foreign('article_id')->references('id')->on('articles')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};

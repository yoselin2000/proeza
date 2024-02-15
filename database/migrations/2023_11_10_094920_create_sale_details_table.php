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
        Schema::create('sale_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cant')->nullable();
            $table->string('frecuency')->nullable();
            $table->double('mbp')->nullable();
            $table->double('total')->nullable();

            $table->unsignedBigInteger('activity_id')->nullable();
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->unsignedBigInteger('article_id')->nullable();
            $table->timestamps();

            //relation
            $table->foreign('activity_id')->references('id')->on('activities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('inventory_id')->references('id')->on('inventories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('sale_details');
    }
};

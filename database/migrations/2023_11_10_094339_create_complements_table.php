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
        Schema::create('complements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');

            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('complement_type_id');
            $table->timestamps();

            //relation
            $table->foreign('activity_id')->references('id')->on('activities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('complement_type_id')->references('id')->on('complement_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complements');
    }
};

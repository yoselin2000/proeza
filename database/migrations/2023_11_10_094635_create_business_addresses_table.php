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
        Schema::create('business_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('property');
            $table->string('time');
            $table->string('direction');
            $table->string('number')->nullable();
            $table->string('zone');
            $table->string('mobile')->nullable();
            $table->string('province');
            $table->text('description');
            $table->string('link')->nullable();
            $table->string('file', 128);

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
        Schema::dropIfExists('business_addresses');
    }
};

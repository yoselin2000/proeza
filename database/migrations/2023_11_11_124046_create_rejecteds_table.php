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
        Schema::create('rejecteds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');

            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            //relation
            $table->foreign('application_id')->references('id')->on('applications')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rejecteds');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('return_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->text('descripcion');
            $table->integer('cont')->nullable();

            $table->unsignedBigInteger('assignment_id');
            $table->unsignedBigInteger('assigned_by');
            $table->unsignedBigInteger('assigned_to');

            $table->timestamps();

            $table->foreign('assigned_by')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('assigned_to')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('assignment_id')->references('id')->on('assignments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('return_components');
    }
};

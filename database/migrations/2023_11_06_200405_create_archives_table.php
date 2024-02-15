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
        Schema::create('archives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file')->nullable();

            $table->unsignedBigInteger('archive_type_id');
            $table->unsignedBigInteger('evaluation_id');
            $table->timestamps();

            //relation
            $table->foreign('evaluation_id')->references('id')->on('evaluations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('archive_type_id')->references('id')->on('archive_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives');
    }
};
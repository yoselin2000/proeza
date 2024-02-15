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
        Schema::create('credits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('monto'); //monto
            $table->double('interes'); //interes
            $table->double('seguro'); //seguro
            $table->integer('plazo'); //plazo
            $table->date('inicio'); //desembolso
            $table->date('cancelacion'); //desembolso
            $table->string('tipo'); //tipo
            $table->string('estado'); // estado

            $table->unsignedBigInteger('application_id');


            $table->timestamps();
            //relation
            $table->foreign('application_id')->references('id')->on('applications')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};

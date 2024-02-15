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
        Schema::create('recoveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha'); //dia
            $table->double('saldoIni'); //interes
            $table->double('capital'); //seguro
            $table->double('interes'); //couta
            $table->double('vencido'); //couta
            $table->double('penal'); //couta
            $table->double('diferido'); //couta
            $table->double('seguro'); //fecha
            $table->double('cuotaTotal'); //saldo
            $table->double('saldoFin'); //fecha

            $table->unsignedBigInteger('credit_id');


            $table->timestamps();
            //relation
            $table->foreign('credit_id')->references('id')->on('credits')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recoveries');
    }
};

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
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount'); //monto
            $table->string('term'); //plazo
            $table->string('feeType'); //tipo de cuota
            $table->string('frequency'); //frecuencia
            $table->string('choose'); //monto a pagar
            $table->date('date')->nullable(); //fecha a pagar
            $table->string('operation'); //Operacion
            $table->string('sequence'); // secuencia
            $table->string('specific'); //destino especifico
            $table->boolean('state')->default(true);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('product_id');


            $table->timestamps();
            //relation
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('destination_id')->references('id')->on('destinations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

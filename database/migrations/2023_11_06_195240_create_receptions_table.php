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
        Schema::create('receptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doc');  //identificador alfanumerico
            $table->integer('fojas');  //cantidad de hojas
            $table->string('type');  //asdfasdfad
            $table->string('estate');  //abierto string
            $table->unsignedBigInteger('evaluation_id');
            $table->unsignedBigInteger('warranty_id');
            $table->unsignedBigInteger('document_id');
            $table->timestamps();

            //relation
            $table->foreign('evaluation_id')->references('id')->on('evaluations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('warranty_id')->references('id')->on('warranties')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('document_id')->references('id')->on('documents')
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
        Schema::dropIfExists('receptions');
    }
};
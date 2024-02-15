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
        Schema::create('family_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');
            $table->unsignedBigInteger('expense_type_id');
            $table->unsignedBigInteger('evaluation_id');
            $table->timestamps();

            //relation
            $table->foreign('expense_type_id')->references('id')->on('expense_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('evaluation_id')->references('id')->on('evaluations')
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
        Schema::dropIfExists('family_expenses');
    }
};
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
        Schema::create('business_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');

            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('expense_type_id');
            $table->timestamps();

            //relation
            $table->foreign('expense_type_id')->references('id')->on('expense_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('business_expenses');
    }
};

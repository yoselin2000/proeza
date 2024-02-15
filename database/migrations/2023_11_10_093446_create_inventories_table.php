<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->double('amount');
            $table->string('unit');
            $table->string('name');
            $table->double('buys')->nullable();
            $table->double('sale')->nullable();
            $table->double('mb')->nullable();
            $table->double('advance')->nullable();
            $table->double('vimp')->nullable();
            $table->double('vipp')->nullable();
            $table->double('vipt')->nullable();


            // $table->string('cant')->nullable();
            // $table->string('frecuency')->nullable();
            // $table->double('mbp')->nullable();
            // $table->double('total')->nullable();
            // $table->boolean('flag')->default(false);

            $table->unsignedBigInteger('activity_id');
            $table->timestamps();

            //relation
            $table->foreign('activity_id')->references('id')->on('activities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};

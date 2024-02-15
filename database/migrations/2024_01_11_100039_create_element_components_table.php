<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('element_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand');
            $table->string('model');
            $table->string('SN');
            $table->text('description');
            $table->boolean('state')->default(true);;

            $table->unsignedBigInteger('company_element_id');
            $table->unsignedBigInteger('agency_id');

            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('company_element_id')->references('id')->on('company_elements')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('element_components');
    }
};

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
        Schema::create('evaluation_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('complement');
            $table->double('value');
            $table->unsignedBigInteger('evaluation_id');
            $table->unsignedBigInteger('asset_type_id');
            $table->timestamps();

            //relation
            $table->foreign('evaluation_id')->references('id')->on('evaluations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('asset_type_id')->references('id')->on('asset_types')
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
        Schema::dropIfExists('evaluation_assets');
    }
};

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('state')->default(true);

            $table->unsignedBigInteger('agency_id');
            $table->unsignedBigInteger('range_id');
            
            $table->timestamps();

            //relation
            $table->foreign('agency_id')->references('id')->on('agencies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('range_id')->references('id')->on('ranges')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

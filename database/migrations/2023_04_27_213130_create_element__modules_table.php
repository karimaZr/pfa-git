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
        Schema::create('element_modules', function (Blueprint $table) {
            $table->id();
            $table->string('Code')->unique();
            $table->string('Nom');
            $table->integer('coifficent');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('element__modules');
    }
};

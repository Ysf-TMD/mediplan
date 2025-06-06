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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string("cin")->nullable();
            $table->string('age')->nullable();
            $table->string('genre')->nullable();
            $table->string('adresse')->nullable();
            $table->foreignId("id_compte")->nullable()->constrained("users");
            $table->foreignId("id_doctor")->nullable()->constrained("doctors");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

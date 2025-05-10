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
        Schema::create('plages_horaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_doctor")->constrained("doctors");
            $table->foreignId("id_etablissement")->constrained("etablissements");
            $table->dateTime("jour_semaine")->nullable();
            $table->dateTime("jour_fin")->nullable();
            $table->string("duree_rdv")->nullable();
            $table->boolean("active")->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plages_horaires');
    }
};

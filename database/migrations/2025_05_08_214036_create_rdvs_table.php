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
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->date('date_rdv');
            $table->dateTime('heur_rdv');
            $table->string("motif");
            $table->string("statut");
            $table->dateTime("date_creation");
            $table->foreignId("id_patient")->constrained("patients");
            $table->foreignId("id_doctor")->constrained("doctors");
            $table->foreignId("id_etablissements")->nullable()->constrained("etablissements");
            $table->string("notes")->nullable();
            $table->foreignId("id_plage_horaire")->nullable()->constrained("plages_horaires");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rdvs');
    }
};

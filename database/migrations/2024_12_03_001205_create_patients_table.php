<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personne_id')->constrained('personnes')->onDelete('cascade');
            $table->string('matricule')->nullable()->unique(); // Matricule unique et nullable
            $table->string('profession')->nullable();
            $table->string('statut_matrimonial')->nullable(); // Célibataire, marié, divorcé, etc.
            $table->string('serologie')->nullable();
            $table->string('groupe_sanguin')->nullable();
            $table->string('contact_urgence')->nullable(); // Contacts d'urgence en format JSON.
            $table->string('date_naissance')->nullable(); // Date de naissance.
            $table->string('ville')->nullable();
            $table->string('quartier')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}

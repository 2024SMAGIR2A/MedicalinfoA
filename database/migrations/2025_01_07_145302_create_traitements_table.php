<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitementsTable extends Migration
{
    public function up()
    {
        Schema::create('traitements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id');
            $table->string('statut'); // exemple : "en cours", "terminé"
            $table->unsignedBigInteger('administre_by'); // ID de la personne ayant administré le traitement
            $table->integer('duree')->nullable(); // Durée du traitement en jours
            $table->string('datePrescription'); // exemple : "en cours", "terminé"
            $table->string('description'); // exemple : "en cours", "terminé"
            $table->timestamps();

            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('traitements');
    }
}

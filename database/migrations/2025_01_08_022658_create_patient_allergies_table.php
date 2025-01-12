<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientAllergiesTable extends Migration
{
    public function up()
    {
        Schema::create('patient_allergies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('allergie_id');
            $table->date('date_declaration')->nullable();
            $table->unsignedBigInteger('declare_par'); // ID de la personne ayant déclaré l'allergie
            $table->timestamps();

            // Foreign keys
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('allergie_id')->references('id')->on('allergies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_allergies');
    }
}

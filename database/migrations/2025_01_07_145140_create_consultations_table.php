<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('medecin_id');
            $table->text('diagnostic')->nullable();
            $table->enum('status', ['E', 'V'])->default('E'); // E = En cours, V = Validé
            $table->string(column: 'motif')->nullable();
            $table->string(column: 'notesMedecin')->nullable();
            $table->string(column: 'dateConsul')->nullable();
            $table->timestamps();

            // Clés étrangères
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('medecin_id')->references('id')->on('medecins')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}

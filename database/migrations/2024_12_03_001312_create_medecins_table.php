<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedecinsTable extends Migration
{
    public function up()
    {
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personne_id'); // Clé étrangère obligatoire
            $table->string('matricule')->nullable()->unique(); // Matricule unique et nullable
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
            $table->string('specialite');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medecins');
    }
}

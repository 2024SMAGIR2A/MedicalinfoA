<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedecinCentreDeSanteTable extends Migration
{
    public function up()
    {
        Schema::create('medecin_centre_de_sante', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medecin_id');
            $table->unsignedBigInteger('centre_de_sante_id');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('medecin_id')->references('id')->on('medecins')->onDelete('cascade');
            $table->foreign('centre_de_sante_id')->references('id')->on('centre_de_santes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('medecin_centre_de_sante');
    }
}

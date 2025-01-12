<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploiDuTempsTable extends Migration
{
    public function up()
    {
        Schema::create('emploi_du_temps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medecin_centre_id');
            $table->date('date_consultation');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('medecin_centre_id')
                  ->references('id')
                  ->on('medecin_centre_de_sante')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('emploi_du_temps');
    }
}

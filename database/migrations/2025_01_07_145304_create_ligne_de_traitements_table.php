<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneDeTraitementsTable extends Migration
{
    public function up()
    {
        Schema::create('ligne_de_traitements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('traitement_id');
            $table->string('medicament');
            $table->string('dosage');
            $table->string('frequence');
            $table->string('instructions');
            $table->timestamps();

            $table->foreign('traitement_id')->references('id')->on('traitements')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ligne_de_traitements');
    }
}

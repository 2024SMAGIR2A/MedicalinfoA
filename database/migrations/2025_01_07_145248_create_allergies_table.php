<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergiesTable extends Migration
{
    public function up()
    {
        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'allergie
            $table->string('niveauSeverite'); // Nom de l'allergie
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('allergies');
    }
}

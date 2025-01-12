<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentreDeSanteTable extends Migration
{
    public function up()
    {
        Schema::create('centre_de_santes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('telephone');
            $table->string('ville');
            $table->string('quartier');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('centre_de_santes');
    }
}

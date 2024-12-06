<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Définit `id` comme clé primaire
            //$table->unsignedBigInteger('personne_id');
            //$table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
            $table->string('role')->nullable(); // Exemple : "admin", "assistant_medical"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneFacturesTable extends Migration
{
    public function up()
    {
        Schema::create('ligne_factures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facture_id');
            $table->string('description');
            $table->decimal('montant', 10, 2);
            $table->timestamps();

            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ligne_factures');
    }
}

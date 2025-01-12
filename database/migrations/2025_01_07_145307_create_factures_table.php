<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id')->unique(); // Une consultation ne peut avoir qu'une seule facture
            $table->decimal('montant_total', 10, 2);
            $table->date('date_facture');
            $table->timestamps();

            // Clé étrangère
            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('factures');
    }
}

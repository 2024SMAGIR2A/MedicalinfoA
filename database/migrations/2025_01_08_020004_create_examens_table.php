<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamensTable extends Migration
{
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_examen_id');
            $table->unsignedBigInteger('consultation_id');
            $table->text('resultats')->nullable();
            $table->text('remarques')->nullable();
            $table->timestamps();

            $table->foreign('type_examen_id')->references('id')->on('type_examens')->onDelete('cascade');
            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('examens');
    }
}

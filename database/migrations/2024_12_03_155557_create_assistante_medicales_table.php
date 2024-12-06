<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_assistantes_medicalles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistanteMedicalesTable extends Migration
{
    public function up()
    {
        Schema::create('assistante_medicales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personne_id');
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assistantes_medicalles');
    }
}

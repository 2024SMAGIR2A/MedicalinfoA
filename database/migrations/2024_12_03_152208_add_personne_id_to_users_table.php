<?php

// Database/Migrations/{timestamp}_add_personne_id_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonneIdToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Ajouter la colonne 'personne_id' comme clé étrangère
            $table->unsignedBigInteger('personne_id'); // Ajouter une colonne pour la clé étrangère
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade'); // Définir la clé étrangère
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Supprimer la clé étrangère et la colonne 'personne_id' si la migration est annulée
            $table->dropForeign(['personne_id']);
            $table->dropColumn('personne_id');
        });
    }
}

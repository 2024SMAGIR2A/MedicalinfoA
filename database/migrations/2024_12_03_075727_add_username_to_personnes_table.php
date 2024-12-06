<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameToPersonnesTable extends Migration
{
    public function up()
    {
        Schema::table('personnes', function (Blueprint $table) {
            $table->string('username')->unique()->after('email'); // Ajout du champ `username`
        });
    }

    public function down()
    {
        Schema::table('personnes', function (Blueprint $table) {
            $table->dropColumn('username'); // Suppression du champ `username`
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsSexeTemoins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jugement_suppletif', function (Blueprint $table) {
            //
            $table->string('sexe_premier_temoin')->nullable();
            $table->string('sexe_deuxieme_temoin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jugement_suppletif', function (Blueprint $table) {
            //
            $table->dropColumn(['sexe_premier_temoin','sexe_deuxieme_temoin']);
        });
    }
}

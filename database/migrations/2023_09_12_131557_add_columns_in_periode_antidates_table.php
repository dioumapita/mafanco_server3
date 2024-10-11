<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInPeriodeAntidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periode_antidates', function (Blueprint $table) {
            //
            $table->integer('mouvement_debut')->nullable();
            $table->integer('mouvement_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('periode_antidates', function (Blueprint $table) {
            //
            $table->dropColumn(['mouvement_debut','mouvement_fin']);
        });
    }
}

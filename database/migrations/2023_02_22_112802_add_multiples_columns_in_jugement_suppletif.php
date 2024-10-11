<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultiplesColumnsInJugementSuppletif extends Migration
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
            $table->bigInteger('num')->nullable()->change();
            $table->integer('num_requette')->nullable();
            $table->string('lieu_transcrit')->nullable();
            $table->string('sexe_requerant')->nullable();
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
            $table->bigInteger('num')->nullable(false)->change();
            $table->dropColumn(['num_requette','lieu_transcrit','sexe_requerant']);
        });
    }
}

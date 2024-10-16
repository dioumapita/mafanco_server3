<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInJugementSuppletifTable extends Migration
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
            $table->string('fonction_president')->nullable();
            $table->string('type_president')->nullable();
            $table->string('fonction_greffe')->nullable();
            $table->string('type_greffe')->nullable();
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
            $table->dropColumn(['fonction_president','type_president','fonction_greffe','type_greffe']);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueNumInTableJugementSuppletif extends Migration
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
            $table->dropUnique('jugement_suppletif_num_unique');
            $table->dropUnique('jugement_suppletif_num_anti_unique');
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
            $table->unique(['num']);
            $table->unique(['num_anti']);
        });
    }
}

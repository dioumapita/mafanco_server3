<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueNumInTableCasierJudiciaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casier_judiciaires', function (Blueprint $table) {
            //
            $table->dropUnique('casier_judiciaires_num_casier_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casier_judiciaires', function (Blueprint $table) {
            //
            $table->unique(['num_casier']);
        });
    }
}

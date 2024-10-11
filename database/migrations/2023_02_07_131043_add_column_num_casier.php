<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNumCasier extends Migration
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
            $table->integer('num_casier')->unique();
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
            $table->dropColumn('num_casier');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnExpireAtInCasierJudiciaires extends Migration
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
            $table->timestamp('expire_at')->nullable();
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
            $table->dropColumn('expire_at');
        });
    }
}
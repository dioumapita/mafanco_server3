<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAnneeIdInCasierJudiciaires extends Migration
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
            $table->unsignedBigInteger('annee_id')->nullable();
            $table->foreign('annee_id')->references('id')->on('annees')
                  ->onDelete('no action');
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
            $table->dropForeign('casier_judiciaires_annee_id_foreign');
            $table->dropColumn('annee_id');
        });
    }
}

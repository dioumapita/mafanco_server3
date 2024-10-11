<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUserIdInCasierJudiciairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casier_judiciaires', function (Blueprint $table) {
           $table->unsignedBigInteger('users_id')->nullable();
           $table->foreign('users_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
            $table->dropForeign(['users_id']);
            $table->dropColumn('users_id');
        });
    }
}

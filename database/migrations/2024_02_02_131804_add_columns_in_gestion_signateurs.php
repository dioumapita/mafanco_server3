<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInGestionSignateurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gestion_signateurs', function (Blueprint $table) {
            //
            $table->string('sexe')->nullable();
            $table->string('fonction')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gestion_signateurs', function (Blueprint $table) {
            //
            $table->dropColumn(['sexe','fonction','status']);
        });
    }
}

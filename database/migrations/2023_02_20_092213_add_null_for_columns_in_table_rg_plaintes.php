<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullForColumnsInTableRgPlaintes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rg_plaintes', function (Blueprint $table) {
            //
            $table->text('partie_civil')->nullable()->change();
            $table->string('orientation')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rg_plaintes', function (Blueprint $table) {
            //
            $table->text('partie_civil')->nullable(false)->change();
            $table->string('orientation')->nullable(false)->change();
        });
    }
}

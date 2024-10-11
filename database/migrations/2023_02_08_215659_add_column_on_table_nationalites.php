<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnTableNationalites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificat_nationalites', function (Blueprint $table) {
            //
            $table->string('article');
            $table->string('signateur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificat_nationalites', function (Blueprint $table) {
            //
            $table->dropColumn(['article','signateur']);
        });
    }
}

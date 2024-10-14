<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInTableCertificatNationalites extends Migration
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
            $table->string('fonction')->nullable();
            $table->string('type')->nullable();
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
            $table->dropColumn(['fonction','type']);
        });
    }
}

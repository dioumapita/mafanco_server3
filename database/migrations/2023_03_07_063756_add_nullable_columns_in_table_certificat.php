<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableColumnsInTableCertificat extends Migration
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
            $table->string('copie')->nullable()->change();
            $table->string('num_copie')->nullable()->change();
            $table->date('date_copie')->nullable()->change();
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
            $table->string('copie')->nullable(false)->change();
            $table->string('num_copie')->nullable(false)->change();
            $table->date('date_copie')->nullable(false)->change();
        });
    }
}

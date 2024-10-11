<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatNationalitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificat_nationalites', function (Blueprint $table) {
            $table->id();
            $table->integer('num');
            $table->string('prenom_nom');
            $table->date('date_naiss');
            $table->string('lieu');
            $table->string('pere');
            $table->string('mere');
            $table->string('domicile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificat_nationalites');
    }
}

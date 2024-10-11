<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoCandidatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_candidat', function (Blueprint $table) {
            $table->id();
            $table->string('centre');
            $table->string('ecole');
            $table->string('n_photo');
            $table->string('prenom_et_nom');
            $table->string('sexe');
            $table->string('date_naiss');
            $table->string('lieu');
            $table->string('pere');
            $table->string('mere');
            $table->integer('ses_bepc');
            $table->integer('pv_bepc');
            $table->string('nat');
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
        Schema::dropIfExists('photo_candidat');
    }
}

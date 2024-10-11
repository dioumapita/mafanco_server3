<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controle', function (Blueprint $table) {
            $table->id();
            $table->string('profil');
            $table->string('nom_candidat');
            $table->string('s');
            $table->string('date_naiss');
            $table->string('lieu');
            $table->string('pere');
            $table->string('mere');
            $table->string('n');
            $table->string('dpe');
            $table->integer('session');
            $table->integer('pv');
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
        Schema::dropIfExists('controle');
    }
}

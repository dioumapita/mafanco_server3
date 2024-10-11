<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugementSuppletifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugement_suppletif', function (Blueprint $table) {
            $table->id();
            $table->string('concerne');
            $table->date('date_naiss');
            $table->string('lieu_naiss');
            $table->string('sexe');
            $table->integer('rang_naiss');
            $table->string('requerant');
            $table->string('profession_requerant');
            $table->string('quartier_requerant');
            $table->date('date_requete');
            $table->string('pere');
            $table->date('date_naiss_pere')->nullable();
            $table->string('lieu_naiss_pere')->nullable();
            $table->string('profession_pere')->nullable();
            $table->string('domicile_pere')->nullable();
            $table->string('mere');
            $table->date('date_naiss_mere')->nullable();
            $table->string('lieu_naiss_mere')->nullable();
            $table->string('profession_mere')->nullable();
            $table->string('domicile_mere')->nullable();
            $table->string('premier_temoin');
            $table->date('date_naiss_premier_temoin')->nullable();
            $table->string('lieu_naiss_premier_temoin')->nullable();
            $table->string('profession_premier_temoin')->nullable();
            $table->string('domicile_premier_temoin')->nullable();
            $table->string('deuxieme_temoin');
            $table->date('date_naiss_deuxieme_temoin')->nullable();
            $table->string('lieu_naiss_deuxieme_temoin')->nullable();
            $table->string('profession_deuxieme_temoin')->nullable();
            $table->string('domicile_deuxieme_temoin')->nullable();
            $table->date('date_audience');
            $table->string('en_presence');
            $table->string('president');
            $table->string('greffier');
            $table->integer('telephone')->nullable();
            $table->date('rendez_vous')->nullable();
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
        Schema::dropIfExists('jugement_suppletif');
    }
}

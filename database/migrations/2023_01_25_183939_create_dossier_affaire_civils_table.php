<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierAffaireCivilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_affaire_civils', function (Blueprint $table) {
            $table->id();
            $table->integer('num_rg');
            $table->integer('num_greffe');
            $table->string('objet');
            $table->text('demandeur');
            $table->string('conseil_1');
            $table->integer('contact_1');
            $table->text('defendeur');
            $table->string('conseil_2');
            $table->integer('contact_2');
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
        Schema::dropIfExists('dossier_affaire_civils');
    }
}

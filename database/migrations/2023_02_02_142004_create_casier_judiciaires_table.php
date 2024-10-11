<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasierJudiciairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casier_judiciaires', function (Blueprint $table) {
            $table->id();
            $table->string('concerne');
            $table->string('pere');
            $table->string('mere');
            $table->date('date_naiss');
            $table->string('lieu');
            $table->string('domicile');
            $table->string('etat_civil');
            $table->string('profession');
            $table->string('nationalite');
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
        Schema::dropIfExists('casier_judiciaires');
    }
}

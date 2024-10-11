<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestRequettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gest_requettes', function (Blueprint $table) {
            $table->id();
            $table->string('datecrea')->nullable();
            $table->string('daterev')->nullable();
            $table->string('numero')->nullable();
            $table->string('date_requete')->nullable();
            $table->string('requerant')->nullable();
            $table->string('objet')->nullable();
            $table->string('arch')->nullable();
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
        Schema::dropIfExists('gest_requettes');
    }
}

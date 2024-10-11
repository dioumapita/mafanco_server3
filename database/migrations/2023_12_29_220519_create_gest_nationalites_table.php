<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestNationalitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gest_nationalites', function (Blueprint $table) {
            $table->id();
            $table->string('datecrea')->nullable();
            $table->string('daterev')->nullable();
            $table->string('numero')->nullable();
            $table->string('date')->nullable();
            $table->string('nom')->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('filiation')->nullable();
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
        Schema::dropIfExists('gest_nationalites');
    }
}

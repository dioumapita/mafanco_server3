<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestAppelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gest_appels', function (Blueprint $table) {
            $table->id();
            $table->string('datecrea')->nullable();
            $table->string('daterev')->nullable();
            $table->string('numero')->nullable();
            $table->string('date_appel')->nullable();
            $table->string('les_parties')->nullable();
            $table->string('type')->nullable();
            $table->string('statuts')->nullable();
            $table->string('place')->nullable();
            $table->string('date_transmission')->nullable();
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
        Schema::dropIfExists('gest_appels');
    }
}

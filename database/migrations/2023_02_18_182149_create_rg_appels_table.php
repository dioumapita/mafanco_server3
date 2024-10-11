<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRgAppelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rg_appels', function (Blueprint $table) {
            $table->id();
            $table->integer('num')->unique();
            $table->date('date_appel');
            $table->text('appelant');
            $table->integer('contact_1')->nullable();
            $table->text('defendeur');
            $table->integer('contact_2')->nullable();
            $table->string('juge');
            $table->string('etat')->nullable();
            $table->date('date_transmition')->nullable();
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
        Schema::dropIfExists('rg_appels');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlumitifCorrectionnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plumitif_correctionnels', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('date');
            $table->string('objet');
            $table->text('affaire');
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
        Schema::dropIfExists('plumitif_correctionnels');
    }
}

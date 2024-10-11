<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestPlumitifCorrectionnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gest_plumitif_correctionnels', function (Blueprint $table) {
            $table->id();
            $table->string('datecrea')->nullable();
            $table->string('daterev')->nullable();
            $table->string('numero')->nullable();
            $table->string('date_decision')->nullable();
            $table->string('affaire')->nullable();
            $table->string('prevention')->nullable();
            $table->string('partie_civile')->nullable();
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
        Schema::dropIfExists('gest_plumitif_correctionnels');
    }
}

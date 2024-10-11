<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRgPlaintesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rg_plaintes', function (Blueprint $table) {
            $table->id();
            $table->integer('num')->unique();
            $table->date('date_plainte');
            $table->string('origine');
            $table->text('infraction');
            $table->text('partie_civil');
            $table->string('orientation');
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
        Schema::dropIfExists('rg_plaintes');
    }
}

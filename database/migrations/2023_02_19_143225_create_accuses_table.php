<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accuses', function (Blueprint $table) {
            $table->id();
            $table->string('prenom_nom');
            $table->date('date_naiss')->nullable();
            $table->string('lieu_naiss')->nullable();
            $table->string('pere')->nullable();
            $table->string('mere')->nullable();
            $table->string('domicile')->nullable();
            $table->timestamps();

            /**
             * referencement de clé étrangère
             */

            $table->unsignedBigInteger('rg_plaintes_id');
            $table->foreign('rg_plaintes_id')->references('id')->on('rg_plaintes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accuses');
    }
}

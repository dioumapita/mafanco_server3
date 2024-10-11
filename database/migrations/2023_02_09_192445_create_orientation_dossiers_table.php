<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrientationDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orientation_dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('lieu_orientation');
            $table->date('date_orientation');
            $table->integer('status')->nullable();
            $table->timestamps();

            //référencement de clé étrangère

            $table->unsignedBigInteger('dossier_affaire_civils_id')->nullable();
            $table->foreign('dossier_affaire_civils_id')->references('id')->on('dossier_affaire_civils')
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
        Schema::dropIfExists('orientation_dossiers');
    }
}

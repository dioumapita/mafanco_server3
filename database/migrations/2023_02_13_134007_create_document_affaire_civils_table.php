<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentAffaireCivilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_affaire_civils', function (Blueprint $table) {
            $table->id();
            $table->string('nom_doc');
            $table->string('chemin_doc');
            $table->timestamps();

            /**
             * référencement de clé étrangère
             */

             $table->unsignedBigInteger('dossier_affaire_civils_id');
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
        Schema::dropIfExists('document_affaire_civils');
    }
}

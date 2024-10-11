<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocRgInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_rg_instructions', function (Blueprint $table) {
            $table->id();
            $table->string('nom_doc');
            $table->string('chemin_doc');
            $table->timestamps();

             /**
             * référencement de clé étrangère
             */

             $table->unsignedBigInteger('rg_instructions_id');
             $table->foreign('rg_instructions_id')->references('id')->on('rg_instructions')
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
        Schema::dropIfExists('doc_rg_instructions');
    }
}

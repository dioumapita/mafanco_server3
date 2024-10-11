<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActeInculpesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acte_inculpes', function (Blueprint $table) {
            $table->id();
            $table->date('date_actes')->nullable();
            $table->text('nature_actes')->nullable();
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
        Schema::dropIfExists('acte_inculpes');
    }
}

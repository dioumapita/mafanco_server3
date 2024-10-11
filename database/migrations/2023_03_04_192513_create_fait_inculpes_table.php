<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaitInculpesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fait_inculpes', function (Blueprint $table) {
            $table->id();
            $table->date('date_faits')->nullable();
            $table->text('nature_faits')->nullable();
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
        Schema::dropIfExists('fait_inculpes');
    }
}

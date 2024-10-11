<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierFlagrantDelitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_flagrant_delits', function (Blueprint $table) {
            $table->id();
            $table->integer('num_rp');
            $table->text('pr_contre');
            $table->string('detention');
            $table->string('conseil');
            $table->integer('contact');
            $table->string('prevention');
            $table->string('plaignant');
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
        Schema::dropIfExists('dossier_flagrant_delits');
    }
}

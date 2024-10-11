<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColumnsNullableOnTableDossierAffaireCivils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dossier_affaire_civils', function (Blueprint $table) {
            //
            $table->integer('num_greffe')->nullable(true)->change();
            $table->string('conseil_1')->nullable(true)->change();
            $table->integer('contact_1')->nullable(true)->change();
            $table->string('conseil_2')->nullable(true)->change();
            $table->string('contact_2')->nullable(true)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dossier_affaire_civils', function (Blueprint $table) {
            //
            $table->integer('num_greffe')->nullable(false)->change();
            $table->string('conseil_1')->nullable(false)->change();
            $table->integer('contact_1')->nullable(false)->change();
            $table->string('conseil_2')->nullable(false)->change();
            $table->string('contact_2')->nullable(false)->change();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocCertificatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_certificats', function (Blueprint $table) {
            $table->id();
            $table->string('copie');
            $table->string('num_copie');
            $table->date('date_copie');
            $table->timestamps();

            /**
             * réferencement de clé étrangère
             */

            $table->unsignedBigInteger('certificat_nationalites_id')->nullable();
            $table->foreign('certificat_nationalites_id')->references('id')->on('certificat_nationalites')
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
        Schema::dropIfExists('doc_certificats');
    }
}

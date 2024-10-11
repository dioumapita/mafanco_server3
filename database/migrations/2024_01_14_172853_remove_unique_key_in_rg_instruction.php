<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueKeyInRgInstruction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rg_instructions', function (Blueprint $table) {
            //
            $table->dropUnique('rg_instructions_num_rp_unique');
            $table->dropUnique('rg_instructions_num_ri_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rg_instructions', function (Blueprint $table) {
            //
            $table->unique('num_rp');
            $table->unique('num_ri');
        });
    }
}

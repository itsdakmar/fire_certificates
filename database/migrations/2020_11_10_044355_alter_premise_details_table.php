<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPremiseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premise_details', function (Blueprint $table) {

            $table->string('pic_name')->nullable()->change();
            $table->string('pic_phone')->nullable()->change();
            $table->string('fc_name')->nullable()->change();
            $table->string('fc_phone')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('premise_details', function (Blueprint $table) {
            //
        });
    }
}

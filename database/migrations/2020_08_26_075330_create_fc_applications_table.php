<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc_applications', function (Blueprint $table) {
            $table->id();
            $table->string('apply_date');
            $table->string('type');
            $table->string('expiry_date');
            $table->string('status');
            $table->string('no_siri');
            $table->unsignedBigInteger('premis_detail_id');
            $table->timestamps();

            $table->foreign('premis_detail_id')->references('id')->on('premise_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fc_applications');
    }
}

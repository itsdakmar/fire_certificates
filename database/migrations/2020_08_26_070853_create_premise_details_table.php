<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premise_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address_1');
            $table->string('address_2');
            $table->unsignedBigInteger('city_id');
            $table->integer('postcode');
            $table->string('phone_number');
            $table->string('fax_number');
            $table->boolean('ert');
            $table->string('pic_name');
            $table->string('pic_phone');
            $table->string('fc_name');
            $table->string('fc_phone');
            $table->unsignedBigInteger('premise_type_id');
            $table->unsignedBigInteger('premise_category_id');
            $table->unsignedBigInteger('office_id');
            $table->timestamps();

            $table->foreign('premise_type_id')->references('id')->on('premise_types');
            $table->foreign('premise_category_id')->references('id')->on('premise_categories');
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premise_details');
    }
}

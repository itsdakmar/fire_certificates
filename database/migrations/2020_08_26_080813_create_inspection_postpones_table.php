<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionPostponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_postpones', function (Blueprint $table) {
            $table->id();
            $table->string('new_inspect_date');
            $table->string('new_inspect_time');
            $table->string('doc_reason_path');
            $table->unsignedBigInteger('inspection_id');
            $table->timestamps();

            $table->foreign('inspection_id')->references('id')->on('inspections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspection_postpones');
    }
}

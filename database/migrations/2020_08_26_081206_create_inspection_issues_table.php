<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_issues', function (Blueprint $table) {
            $table->id();
            $table->string('new_inspect_date');
            $table->string('new_inspect_time');
            $table->unsignedBigInteger('inspection_id');
            $table->timestamps();

            $table->foreign('inspection_id')->references('id')->on('inspections')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspection_issues');
    }
}

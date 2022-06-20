<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class DrinkingWaterOffice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinking_water_offices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->string('address');
            $table->date('project_started_date');
            $table->string('budget');
            $table->string('time_period');
            $table->string('progress_status');
            $table->string('remarks')->nullable();
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
        //
    }
}

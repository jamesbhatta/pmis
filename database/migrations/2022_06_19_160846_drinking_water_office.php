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
            $table->string('ProjectName');
            $table->string('district');
            $table->string('municipality');
            $table->date('starting_date')->nullable();
            $table->string('Population_to_be_benefited');
            $table->string('CostEstimate');
            $table->string('lastYearExpenses');
            $table->string('lastYearProgress');
            $table->string('chaluArthikBarshaBudget');
            $table->string('ChairmanName')->nullable();
            $table->string('ChairmanContact')->nullable();
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

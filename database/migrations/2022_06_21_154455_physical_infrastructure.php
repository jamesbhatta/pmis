<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhysicalInfrastructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_infrastructures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ProjectName');
            $table->string('district');
            $table->string('municipality');
            $table->date('starting_date')->nullable();
            $table->string('budget');
            $table->string('so_far_progress');
            $table->string('financial_progress')->nullable();
            $table->string('physical_progress')->nullable();
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

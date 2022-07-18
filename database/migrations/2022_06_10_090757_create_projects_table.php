<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('fiscal_year_id')->constrained('fiscal_years');
            $table->foreignId('organization_id')->constrained('organizations')->nullable();
            $table->foreignId('project_type_id')->constrained('project_types')->nullable();
            $table->integer('budget')->nullable();
            $table->integer('budget_upashirshakh')->nullable();
            $table->string('budget_source')->nullable();
            $table->string('expenditure_type')->nullable();
            $table->string('expenditure_upashirshakh')->nullable();
            $table->integer('last_year_expenditure')->nullable();
            $table->string('population_to_be_benefited')->nullable();
            $table->integer('last_year_physical_progress')->nullable();
            $table->float('economic_progress_percent')->default(0);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('projects');
    }
}

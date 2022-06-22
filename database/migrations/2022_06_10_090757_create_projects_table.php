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
            $table->foreignId('organization_id')->constrained('organizations');
            $table->string('project_type');
            $table->string('budget')->nullable();
            $table->string('budget_source')->nullable();
            $table->text('description')->nullable();
            $table->string('population_to_be_benefited')->nullable();
            $table->string('chairman_name')->nullable();
            $table->string('chairman_contact')->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->boolean('estimate_completed')->default(false);
            $table->string('agreement_date')->nullable();
            $table->date('agreement_date_ad')->nullable();
            $table->string('project_start_date')->nullable();
            $table->date('project_start_date_ad')->nullable();
            $table->string('project_completion_date')->nullable();
            $table->date('project_completion_date_ad')->nullable();
            $table->string('tender_date_ad')->nullable();
            $table->date('tender_date')->nullable();
            $table->boolean('wip')->nullable();
            $table->boolean('followed_up')->nullable();
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
        Schema::dropIfExists('physical_progress');
    }
}

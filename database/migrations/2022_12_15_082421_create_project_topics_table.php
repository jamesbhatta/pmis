<?php

use App\ProjectTopic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        $topics = [
            ['title' => 'सिचाई',],
            ['title' => 'खाने पानी',],
            ['title' => 'पूर्वधार',],
            ['title' => 'सहरी विकास',],
            ['title' => 'यातायात',],
        ];

        foreach ($topics as $topic) {
            ProjectTopic::query()->create([
                'title' => $topic['title']
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_topics');
    }
}

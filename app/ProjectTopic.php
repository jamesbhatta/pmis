<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTopic extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        ['id' => 1, 'title' => 'सिचाई',],
        ['id' => 2, 'title' => 'खाने पानी',],
        ['id' => 3, 'title' => 'पूर्वधार',],
        ['id' => 4, 'title' => 'सहरी विकास',],
        ['id' => 5, 'title' => 'यातायात',],
    ];
}

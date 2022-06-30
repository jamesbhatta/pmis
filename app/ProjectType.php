<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function topic()
    {
        return $this->belongsTo(ProjectTopic::class, 'topic_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

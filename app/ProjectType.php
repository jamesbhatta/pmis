<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

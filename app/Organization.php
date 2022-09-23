<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function project()
    {
        return $this->hasMany(Project::class);
    }
}

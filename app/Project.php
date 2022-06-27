<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function physicalProgress()
    {
        return $this->hasOne(PhysicalProgress::class);
    }

    public function economicProgress()
    {
        return $this->hasOne(EconomicProgress::class);
    }
}

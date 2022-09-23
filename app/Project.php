<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::addGlobalScope('from_fiscal_year', function(Builder $builder) {
            $builder->where('fiscal_year_id', active_fiscal_year()->id);
        });
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function physicalProgress()
    {
        return $this->hasOne(PhysicalProgress::class);
    }

    public function economicProgresses()
    {
        return $this->hasMany(EconomicProgress::class);
    }
}

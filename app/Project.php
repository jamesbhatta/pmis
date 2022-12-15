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
            $builder->where('fiscal_year_id', \App\FiscalYear::latest()->where('is_running','1')->get()[0]->id);
        });
    }

    public function scopeFiscalYear($query,$fiscal_year_id){
        return $query->where('fiscal_year_id',$fiscal_year_id);
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

    public function image()
    {
        return $this->hasMany(photo::class);
    }

    public function getStatusAttribute()
    {
        if($this->last_year_physical_progress==100){
            return true;
        }
    }

    public function getCountAttribute()
    {
        if($this->last_year_physical_progress==100){

        }
    }
}

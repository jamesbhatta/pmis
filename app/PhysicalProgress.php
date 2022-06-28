<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalProgress extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function () {
            $this->fillAdDates();
        });
        static::updating(function () {
            $this->fillAdDates();
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function fillAdDates()
    {
        if ($this->agreement_date) {
            $this->agreement_date_ad = bs_to_ad($this->agreement_date);
        }
        if ($this->project_start_date) {
            $this->project_start_date_ad = bs_to_ad($this->project_start_date);
        }
        if ($this->project_completion_date) {
            $this->project_completion_date_ad = bs_to_ad($this->project_completion_date);
        }
        if ($this->project_completion_date) {
            $this->project_completion_date_ad = bs_to_ad($this->project_completion_date);
        }
    }
}

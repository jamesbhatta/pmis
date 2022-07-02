<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetSource extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_type_model extends Model
{
    use HasFactory;
    protected $table='project_type';
    protected $guarded = ['id'];
    
}

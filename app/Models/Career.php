<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
   protected $fillable = [
    'position',
    'description',
    'industry',
    'experience',
    'salary',
    'location',
    'welding_types',
    'working_time',
    'benefits',
    'skills',
    'roles_responsibilities',
    'education',
    'status'
];
}   

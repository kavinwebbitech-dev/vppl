<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'extra_content_list' => 'array',
    ];
}

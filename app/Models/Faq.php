<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $guarded = [];

    // Faq.php
    public function questions()
    {
        return $this->hasMany(FaqQuestion::class);
    }

}

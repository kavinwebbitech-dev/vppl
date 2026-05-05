<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $guarded = [];


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($service) {

    //         $slug = Str::slug($service->name);

    //         $count = self::where('slug', 'LIKE', "{$slug}%")
    //             ->where('id', '!=', $service->id)
    //             ->count();

    //         $service->slug = $count ? "{$slug}-" . ($count + 1) : $slug;
    //     });
    // }
}

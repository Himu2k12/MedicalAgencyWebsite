<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'city'
            ]
        ];
    }
    public function country(){
        return    $this->belongsTo(Country::class);
    }
}

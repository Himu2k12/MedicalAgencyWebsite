<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'treatment'
            ]
        ];
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}

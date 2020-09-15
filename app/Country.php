<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'country'
            ]
        ];
    }
    public function cities(){
     return   $this->hasMany(City::class);
    }
    public function hospitals($id){
        return DB::table('hospitals')
            ->where('country_id',$id)
            ->count('id');
    }
}

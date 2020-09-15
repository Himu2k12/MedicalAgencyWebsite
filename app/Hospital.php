<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hospital extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'hospital_name'
            ]
        ];
    }
    public function featureImage($id){
        return DB::table('hospital_images')
            ->select('image')
            ->where('hospital_id','=',$id)
            ->first();
    }
}

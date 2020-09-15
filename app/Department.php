<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'department'
            ]
        ];
    }
    public function treatments(){
        return $this->hasMany(Treatment::class);
    }
    public function DepartmentTretments($id){
        return DB::table('treatments')
            ->where('department_id',$id)
            ->select('*')
            ->get();
    }
    public function departmentName($id){
        return DB::table('departments')
            ->where('id',$id)
            ->select('department')
            ->first();
    }
}

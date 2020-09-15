<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Hospital;
use App\HospitalBrand;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function home(){

        $categories=Category::where('status',1)->limit(9)->get();
        $newHospitalBrand=HospitalBrand::where('status',1)->get();
        return view('Front.Home.home-page',['categories'=>$categories,'newHospitalBrand'=>$newHospitalBrand]);
    }
    public function hospitalPage(){
        $countries=Country::where('status',1)->get();
        $hospitals=Hospital::where('status',1)->get();
        return view('Front.Hospital.hospital-page',['countries'=>$countries,'hospitals'=>$hospitals]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Country;
use App\Department;
use App\Hospital;
use App\HospitalBrand;
use App\HospitalDepartment;
use App\HospitalFacilities;
use App\HospitalImage;
use App\HospitalTreatment;
use App\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use League\CommonMark\Inline\Parser\BacktickParser;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCategoryForm(){
        $categories=Category::all();
        return view('Backend.Category.category-form',['categories'=>$categories]);
    }
    public function createCategory(Request $request){

        $request->validate([
           'category'=>'unique:categories'
        ]);
        //dd($request->file('logo'));
        if ($request->file('logo')){
            $SlideImage = $request->file('logo');
            $imageName = $SlideImage->getClientOriginalName();
            $directory = 'websiteImages/';
            $temp = explode(".", $imageName);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $imgUrlSlide = $directory . $newfilename;
            Image::make($SlideImage)->resize(85,85)->save($imgUrlSlide);
        }
        $newCategory=new Category();
        $newCategory->category=$request->category;
        $newCategory->logo=$imgUrlSlide;
        $newCategory->save();

        return redirect('/categories')->with('message','Category saved Successfully!');
    }
    public function DeactivateCategory($slug){
        $categoryid=Category::where('slug',$slug)->first();
        $categoryid->status=0;
        $categoryid->Save();

        return back()->with('message','Category Info deactivated!');
    }
    public function activateCategory($slug){
        $categoryid=Category::where('slug',$slug)->first();
        $categoryid->status=1;
        $categoryid->Save();

        return back()->with('message','Category Info deactivated!');
    }
    public function editCategory($slug){
        $editCategory=Category::where('slug',$slug)->first();
        return view('Backend.Category.edit-category',['editInfo'=>$editCategory]);
    }
    public function updateCategory(Request $request){
        $request->validate([
            'category'=>'required'
        ]);
        $newCategory=Category::find($request->id);
        //dd($request->file('logo'));
        if ($request->file('logo')){
            $SlideImage = $request->file('logo');
            $imageName = $SlideImage->getClientOriginalName();
            $directory = 'websiteImages/';
            $temp = explode(".", $imageName);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $imgUrlSlide = $directory . $newfilename;
            Image::make($SlideImage)->resize(85,85)->save($imgUrlSlide);
            $newCategory->logo=$imgUrlSlide;
        }
        $newCategory->category=$request->category;
        $newCategory->save();

        return redirect('/categories')->with('message','Category Updated Successfully!');
    }

    public function viewCountry(){
        $countries=Country::all();
        return view('Backend.Country.add-country',['countries'=>$countries]);
    }
    public function createCountry(Request $request){
        $request->validate([
            'country'=>'required|unique:countries'
        ]);
        $newCountry=new Country();
        $newCountry->country=$request->country;
        $newCountry->status=$request->status;
        $newCountry->save();

        return Back()->with('message','Country Created Successfully!');
    }
    public function editCountry($slug){
        $editInfo=Country::where('slug',$slug)->first();
        return view('Backend.Country.edit-country',['editInfo'=>$editInfo]);
    }
    public function updateCountry(Request $request){

        $request->validate([
            'country'=>'required'
        ]);
        $updateinfo=Country::find($request->id);
        $updateinfo->country=$request->country;
        $updateinfo->status=$request->status;
        $updateinfo->save();

        return redirect('/view-add-country-page')->with('message','Country info Updated');
    }

    public function viewCity(){
        $cities=City::all();
        $country=Country::where('status',1)->get();
        return view('Backend.City.add-city',['cities'=>$cities,'country'=>$country]);
    }
    public function createCity(Request $request){
        $request->validate([
            'city'=>'required|unique:cities',
            'country_id'=>'required'
        ]);
        $newCity=new City();
        $newCity->city=$request->city;
        $newCity->country_id=$request->country_id;
        $newCity->status=$request->status;
        $newCity->save();

        return Back()->with('message','City Created Successfully!');
    }
    public function editCity($slug){
        $editInfo=City::where('slug',$slug)->first();
        $country=Country::where('status',1)->get();
        return view('Backend.City.edit-city',['editInfo'=>$editInfo,'country'=>$country]);
    }
    public function updateCity(Request $request){

        $request->validate([
           'city'=>'required'
        ]);
        $updateinfo=City::find($request->id);
        $updateinfo->city=$request->city;
        $updateinfo->country_id=$request->country_id;
        $updateinfo->status=$request->status;
        $updateinfo->save();

        return redirect('/view-add-city-page')->with('message','City info Updated');
    }
    public function cities(Request $request){
        $cities= City::where('country_id',$request->id)->get();
        return response(json_encode($cities));
    }

    public function hospitalBrandPage(){
        $hospitalBrands=HospitalBrand::all();
        return view('Backend.HospitalBrand.hospital-brand-page',['hospitalBrands'=>$hospitalBrands]);
    }
    public function createHospitalBrand(Request $request){
        $request->validate([
            'brand_name'=>'required|unique:hospital_brands'
        ]);
        $newHospitalBrand=new HospitalBrand();
        //dd($request->file('logo'));
        if ($request->file('logo')){
            $SlideImage = $request->file('logo');
            $imageName = $SlideImage->getClientOriginalName();
            $directory = 'websiteImages/';
            $temp = explode(".", $imageName);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $imgUrlSlide = $directory . $newfilename;
            Image::make($SlideImage)->save($imgUrlSlide);
            $newHospitalBrand->logo=$imgUrlSlide;
        }
        $newHospitalBrand->brand_name=$request->brand_name;
        $newHospitalBrand->save();

        return redirect('/view-add-hospital-brand-page')->with('message','Hospital Brand Updated Successfully!');
    }
    public function editHospitalbrand($slug){
        $editInfo=HospitalBrand::where('slug',$slug)->first();
        return view('Backend.HospitalBrand.edit-hospitalBrand',['editInfo'=>$editInfo]);
    }
    public function UpdateHospitalBrand(Request $request){
        $request->validate([
            'brand_name'=>'required',
        ]);
        $updateinfo=HospitalBrand::find($request->id);
        if ($request->file('logo')){
            $SlideImage = $request->file('logo');
            $imageName = $SlideImage->getClientOriginalName();
            $directory = 'websiteImages/';
            $temp = explode(".", $imageName);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $imgUrlSlide = $directory . $newfilename;
            Image::make($SlideImage)->save($imgUrlSlide);
            $updateinfo->logo=$imgUrlSlide;
        }
        $updateinfo->brand_name=$request->brand_name;
        $updateinfo->status=$request->status;
        $updateinfo->save();

        return redirect('view-add-hospital-brand-page')->with('message','Hospital Brand info Updated');
    }
    public function viewDepartment(){
        $departments=Department::all();
        return view('Backend.Department.add-department',['departments'=>$departments]);
    }
    public function createDepartment(Request $request){
        $request->validate([
            'department'=>'required|unique:departments',
        ]);
        $newDepartment=new Department();
        $newDepartment->department=$request->department;
        $newDepartment->status=$request->status;
        $newDepartment->save();

        return redirect('/view-add-department-page')->with('message','Department Created Successfully!');
    }
    public function editDepartment($slag){
        $departments=Department::where('slug',$slag)->first();
        return view('Backend.Department.edit-department',['departments'=>$departments]);
    }
    public function updateDepartment(Request $request){
        $request->validate([
            'department'=>'required',
        ]);
        $updateDepartment=Department::find($request->id);
        $updateDepartment->department=$request->department;
        $updateDepartment->status=$request->status;
        $updateDepartment->save();
        return redirect('/view-add-department-page')->with('message','Department Updated Successfully!');
    }

    public function viewTreatment(){
        $treatments=Treatment::all();
        $departments=Department::where('status',1)->get();
        return view('Backend.Treatment.add-treatment',['treatments'=>$treatments,'departments'=>$departments]);
    }
    public function createTreatment(Request $request){
        $request->validate([
            'treatment'=>'required|unique:treatments',
        ]);
        $newTreatment=new Treatment();
        $newTreatment->department_id=$request->department_id;
        $newTreatment->treatment=$request->treatment;
        $newTreatment->status=$request->status;
        $newTreatment->save();

        return redirect('/view-add-treatment-page')->with('message','Treatment Created Successfully!');
    }
    public function editTreatment($slag){
        $treatment=Treatment::where('slug',$slag)->first();
        $departments=Department::where('status',1)->get();
        return view('Backend.Treatment.edit-treatment',['treatment'=>$treatment,'departments'=>$departments]);
    }
    public function updateTreatment(Request $request){
        $request->validate([
            'treatment'=>'required',
            'department_id'=>'required',
        ]);
        $updateTreatment=Treatment::find($request->id);
        $updateTreatment->department_id=$request->department_id;
        $updateTreatment->treatment=$request->treatment;
        $updateTreatment->status=$request->status;
        $updateTreatment->save();
        return redirect('/view-add-treatment-page')->with('message','Treatment Updated Successfully!');
    }

    public function showhHospitalForm(){
        $countries=Country::where('status',1)->get();
        $cities=City::where('status',1)->get();
        $hospitalBrands=HospitalBrand::where('status',1)->get();
        $hospitals=DB::table('hospitals')
            ->join('cities','cities.id','=','hospitals.city_id')
            ->join('countries','hospitals.country_id','=','countries.id')
            ->select('cities.city','countries.country','hospitals.id','hospitals.slug','hospitals.hospital_name','hospitals.status','hospitals.created_at','hospitals.updated_at')
            ->get();
        $departments=Department::where('status',1)->get();
        return view('Backend.Hospital.add-hospital',['hospitalBrands'=>$hospitalBrands,'cities'=>$cities,'hospitals'=>$hospitals,'countries'=>$countries,'departments'=>$departments]);
    }
    public function createHospital(Request $request){

        $request->validate([
           'hospital_name'=>'required',
           'established_in'=>'required|numeric',
           'number_of_beds'=>'required|numeric',
           'about'=>'required|max:30000',
           'specialist'=>'required|max:30000',
           'location'=>'required|max:30000',
           'address'=>'required',
        ]);

        $newHospital=new Hospital();
        $newHospital->country_id=$request->country;
        $newHospital->city_id=$request->city;
        $newHospital->brand_id=$request->brand;
        $newHospital->hospital_name=$request->hospital_name;
        $newHospital->established_in=$request->established_in;
        $newHospital->number_of_beds=$request->number_of_beds;
        $newHospital->speciality=$request->speciality;
        $newHospital->about=$request->about;
        $newHospital->specialist=$request->specialist;
        $newHospital->infrastructure=$request->infrastructure;
        $newHospital->address=$request->address;
        $newHospital->location=$request->location;
        $newHospital->status=0;
        $newHospital->save();
        $id=$newHospital->id;
        $slug=$newHospital->slug;

        foreach ($request->department_id as $item){
            $newDepartment=new HospitalDepartment();
            $newDepartment->hospital_id=$id;
            $newDepartment->department_id=$item;
            $newDepartment->save();
        }
        return redirect('/second-step/'.$slug);
    }
    public function secondCreateHospital($slug){
        $hospital=Hospital::where('slug',$slug)->first();
        $department=HospitalDepartment::where('hospital_id',$hospital->id)->get();
        $treatmentOfDepartment=new Department();
        return view('Backend.Hospital.second-step',['hospital'=>$hospital,'slug'=>$slug,'department'=>$department,'treatmentOfDepartment'=>$treatmentOfDepartment]);
    }
    public function finalCreateHospital(Request $request){

        foreach ($request->treatment_id as $item) {
            $hospitalTreatment = new HospitalTreatment();
            $hospitalTreatment->hospital_id = $request->hopital_id;
            $hospitalTreatment->treatment_id = $item;
            $hospitalTreatment->save();
        }
        return redirect('/view-add-hospital-page')->with('message','Hospital Info saved!');
    }
    public function editHospital($slug){
        $hospital=Hospital::where('slug',$slug)->first();
        $countries=Country::where('status',1)->get();
        $cities=City::where('country_id',$hospital->country_id)->get();
        $hospitalBrands=HospitalBrand::where('status',1)->get();
        $departments=Department::where('status',1)->get();
        $selectedDepartments=HospitalDepartment::where('hospital_id',$hospital->id)->get();
        return view('Backend.Hospital.edit-hospital',['hospital'=>$hospital,
            'countries'=>$countries,
            'cities'=>$cities,
            'hospitalBrands'=>$hospitalBrands,
            'departments'=>$departments,
            'selectedDepartments'=>$selectedDepartments,

            ]);
    }
    public function updateAndSecondStep(Request $request){
        $request->validate([
            'hospital_name'=>'required',
            'established_in'=>'required|numeric',
            'number_of_beds'=>'required|numeric',
            'about'=>'required|max:30000',
            'specialist'=>'required|max:30000',
            'location'=>'required|max:30000',
            'address'=>'required',
        ]);
        $newHospital=Hospital::find($request->id);
        $newHospital->country_id=$request->country;
        $newHospital->city_id=$request->city;
        $newHospital->brand_id=$request->brand;
        $newHospital->hospital_name=$request->hospital_name;
        $newHospital->established_in=$request->established_in;
        $newHospital->number_of_beds=$request->number_of_beds;
        $newHospital->speciality=$request->speciality;
        $newHospital->about=$request->about;
        $newHospital->specialist=$request->specialist;
        $newHospital->infrastructure=$request->infrastructure;
        $newHospital->address=$request->address;
        $newHospital->location=$request->location;
        $newHospital->status=0;
        $newHospital->save();
        $id=$request->id;
        $slug=$newHospital->slug;

        $existOrNot=HospitalDepartment::where('hospital_id',$newHospital->id)->get();
        foreach ($existOrNot as $item){
            $delete=HospitalDepartment::find($item->id);
            $delete->forceDelete();
        }

        foreach ($request->department_id as $item){
               $newDepartment = new HospitalDepartment();
               $newDepartment->hospital_id = $id;
               $newDepartment->department_id = $item;
               $newDepartment->save();

        }
        return redirect('/edit-second-step/'.$slug);
    }

    public function editSecondPage($slug){
        $hospital=Hospital::where('slug',$slug)->first();
        $department=HospitalDepartment::where('hospital_id',$hospital->id)->get();
        $treatmentOfDepartment=new Department();
        $treatmentsHospital=HospitalTreatment::where('hospital_id',$hospital->id)->get();
        return view('Backend.Hospital.edit-second-step',['treatmentsHospital'=>$treatmentsHospital,'hospital'=>$hospital,'slug'=>$slug,'department'=>$department,'treatmentOfDepartment'=>$treatmentOfDepartment]);

    }

    public function FinalUpdate(Request $request){
        $treatments=HospitalTreatment::where('hospital_id',$request->hopital_id)->get();
        foreach ($treatments as $item){
            $old=HospitalTreatment::find($item->id);
            $old->forceDelete();
        }

             foreach ($request->treatment_id as $item) {
                 $hospitalTreatment = new HospitalTreatment();
                 $hospitalTreatment->hospital_id = $request->hopital_id;
                 $hospitalTreatment->treatment_id = $item;
                 $hospitalTreatment->save();
             }
        return redirect('/view-add-hospital-page')->with('message','Hospital Info Updated!');
    }

    public function ImagePage($slug){
        $hospital=Hospital::where('slug',$slug)->first();
        $files=DB::table('hospital_images')
            ->leftJoin('hospitals','hospitals.id','=','hospital_images.hospital_id')
            ->select('hospital_images.*','hospitals.hospital_name')
            ->where('hospital_images.hospital_id','=',$hospital->id)
            ->get();

        return view('Backend.Hospital.images',['slug',$slug,'files'=>$files,'hospital'=>$hospital]);
    }
    public function createImage(Request $request){

        $doc=$request->file('document');

        for($i = 0; $i < Count($doc); ++$i) {

            $file=$doc[$i];
            //dd($file);
            $fileName = $file->getClientOriginalName() ;
            $name=explode('.',$fileName)[0];
            $destinationPath = public_path().'/websiteimages/' ;
            $temp = explode(".", $fileName);
            $newfilename= round(microtime(true)) . '.' . end($temp);
            $finalName=$name.$newfilename;
            $file->move($destinationPath,$finalName);

            $newdoc=new HospitalImage();
            $newdoc->image=$finalName;
            $newdoc->hospital_id=$request->hospital_id;
            $newdoc->status=1;
            $newdoc->save();
        }

        return redirect('view-add-hospital-page')->With('message','Images Uploaded Successfully!');
    }
    public function EditFacilitiesForm($slug){
        $hospital=Hospital::where('slug',$slug)->first();
        $facilities=HospitalFacilities::where('hospital_id',$hospital->id)->get();
        return view('Backend.Hospital.facilities',['hospital'=>$hospital,'facilities'=>$facilities]);
    }
    public function createFacilities(Request $request){

        $this->validate($request,[
            'comfort'=>'required',
            'money'=>'required',
            'food'=>'required',
            'transport'=>'required',
            'treatment'=>'required',
            'language'=>'required',
        ]);

        $newFacility=new HospitalFacilities();
        $newFacility->hospital_id=$request->hospital_id;
        $newFacility->comfort=$request->comfort;
        $newFacility->money=$request->money;
        $newFacility->food=$request->food;
        $newFacility->transport=$request->transport;
        $newFacility->treatment=$request->treatment;
        $newFacility->language=$request->language;
        $newFacility->save();

        $hospital=Hospital::find($request->hospital_id);
        $hospital->status=1;
        $hospital->save();
        return redirect('/view-add-hospital-page')->with('message','Facilities Stored!');
    }
}

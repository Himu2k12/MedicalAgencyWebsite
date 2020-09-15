@extends('Backend.master')

@section('title')
    Hospital
@endsection

@section('style')
    <link href="{{asset('/Assets/')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Edit Hospital</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Hospital</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ url('update-hospital') }}" enctype="multipart/form-data" name="editform">
                                            @csrf
                                            <div class="form-group row">
                                                <label  for="name" class="col-md-2 col-form-label text-md-right">{{ __('Country') }}</label>
                                                <div class="col-md-4">
                                                    <select id="country" name="country" class="form-control">
                                                        <option value="">Select Country</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->country}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Cities') }}</label>
                                                <div class="col-md-4">
                                                    <select id="city" name="city" class="form-control">
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->city}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Brand Name') }}</label>
                                                <div class="col-md-4">
                                                    <select id="brand" name="brand" class="form-control">
                                                        <option value="">Select Brand Name</option>
                                                        @foreach($hospitalBrands as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Hospital name') }}</label>

                                                <div class="col-md-4">
                                                    <input  required type="text" class="form-control @error('hospital_name') is-invalid @enderror" value="{{$hospital->hospital_name}}" name="hospital_name"/>
                                                    <input  type="hidden" value="{{$hospital->id}}" name="id"/>
                                                    @error('hospital_name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Established In') }}</label>

                                                <div class="col-md-4">
                                                    <input  required type="number" class="form-control @error('established_in') is-invalid @enderror" value="{{$hospital->established_in}}" name="established_in"/>
                                                    @error('established_in')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Number Of Beds') }}</label>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control @error('number_of_beds') is-invalid @enderror" value="{{$hospital->number_of_beds}}" name="number_of_beds"/>
                                                    @error('number_of_beds')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Speciality') }}</label>

                                                <div class="col-md-4">
                                                    <input  required type="text"  class="form-control @error('speciality') is-invalid @enderror" value="{{$hospital->number_of_beds}}" name="speciality"/>
                                                    @error('speciality')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Departments') }}</label>
                                                <div class="col-md-4 form-group overflow-auto border border-secondary rounded-sm " style="height: 150px">
                                                    @foreach($departments as $item)

                                                        <input type="checkbox"
                                                            @foreach($selectedDepartments as $department)
                                                            @if($department->department_id==$item->id) checked @endif
                                                            @endforeach  value="{{$item->id}}" name="department_id[]"/> {{$item->department}}<br>

                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('About Hospital') }}</label>

                                                <div class="col-md-10">
                                                    <textarea id="summernote" name="about">{!! $hospital->about !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Team & Specialist') }}</label>
                                                <div class="col-md-10">
                                                    <textarea id="summernote2" name="specialist">{!! $hospital->specialist !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Infrastructure') }}</label>
                                                <div class="col-md-10">
                                                    <textarea id="summernote4" name="infrastructure">{!! $hospital->infrastructure !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>
                                                <div class="col-md-4">
                                                    <textarea rows="5" class="form-control" name="address">{!! $hospital->address !!}</textarea>
                                                </div>
                                                <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Location') }}</label>
                                                <div class="col-md-5">
                                                    <textarea rows="5" id="summernote3" class="form-control" name="location">{!! $hospital->location !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="col-md-2 offset-md-5 btn btn-primary">
                                                    {{ __('Update & Next') }}
                                                </button>
                                                <a href="{{url('/edit-second-step/'.$hospital->slug)}}" type="button" class="col-md-2 offset-md-3 btn btn-success">
                                                    {{ __('Same & Next') }}
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script>
        $("#country").on("change", function(){
            var id = this.value;
            getCity(id);
        });
        function getCity(id){
            $.ajax({
                type: 'POST',
                url: '{{url('/cities-By-country')}}',
                data: {id:id,"_token":"{{csrf_token()}}"},


            }).done(function(data) {

                $('#city').empty();
                $.each(JSON.parse(data), function (index, subcatObj) {
                    $('#city').append('<option value="'+subcatObj.id+'">'+subcatObj.city+'</option>');
                })

            });
        }
        $('#summernote').summernote({
            placeholder: 'Enter About here',
            tabsize: 4,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#summernote2').summernote({
            placeholder: 'Enter Speciality Here',
            tabsize: 4,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#summernote3').summernote({
            placeholder: 'Enter Location Here',
            tabsize: 4,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#summernote4').summernote({
            placeholder: 'Enter Infrastructure Here',
            tabsize: 4,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        document.forms['editform'].elements['country'].value = '{{$hospital->country_id}}';
        document.forms['editform'].elements['city'].value = '{{$hospital->city_id}}';
        document.forms['editform'].elements['brand'].value = '{{$hospital->brand_id}}';
        document.forms['editform'].elements['department_id'].value = '{{$hospital->department_id}}';
    </script>



@endsection


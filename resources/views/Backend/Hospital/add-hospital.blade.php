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
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Hospital</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <nav class="divstyle border-bottom-success">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Hospital</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false">All Hospitals</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Add Hospital</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ url('create-hospital') }}" enctype="multipart/form-data">
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
                                                        <option value="">Select city</option>
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
                                                        <input  required type="text" class="form-control @error('hospital_name') is-invalid @enderror" value="{{old('hospital_name')}}" name="hospital_name"/>
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
                                                    <input  required type="number" class="form-control @error('established_in') is-invalid @enderror" value="{{old('established_in')}}" name="established_in"/>
                                                    @error('established_in')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Number Of Beds') }}</label>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control @error('number_of_beds') is-invalid @enderror" value="{{old('number_of_beds')}}" name="number_of_beds"/>
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
                                                    <input  required type="text"  class="form-control @error('speciality') is-invalid @enderror" value="{{old('speciality')}}" name="speciality"/>
                                                    @error('speciality')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Departments') }}</label>
                                                <div class="col-md-4 form-group overflow-auto border border-secondary rounded-sm " style="height: 150px">
                                                    @foreach($departments as $item)
                                                        <input type="checkbox" value="{{$item->id}}" name="department_id[]"/> {{$item->department}}<br>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('About Hospital') }}</label>

                                                <div class="col-md-10">
                                                    <textarea id="summernote" name="about"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Team & Specialist') }}</label>
                                                <div class="col-md-10">
                                                    <textarea id="summernote2" name="specialist"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Infrastructure') }}</label>
                                                <div class="col-md-10">
                                                    <textarea id="summernote4" name="infrastructure"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>
                                                <div class="col-md-4">
                                                    <textarea rows="5" class="form-control" name="address"></textarea>
                                                </div>
                                                <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Location') }}</label>
                                                <div class="col-md-5">
                                                    <textarea rows="5" id="summernote3" class="form-control" name="location"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="col-md-2 offset-md-5 btn btn-primary">
                                                    {{ __('Save & Next') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">All Hospitals</h6>
                                        </div>
                                    </div>
                                    <div class="card-body row table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Hospital Name</th>
                                                <th>City</th>
                                                <th>Country</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($hospitals as $item)
                                                <tr class="odd gradeX">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->hospital_name}}</td>
                                                    <td>{{ $item->city}}</td>
                                                    <td>{{ $item->country}}</td>
                                                    <td>{{ $item->created_at}}</td>
                                                    <td>{{ $item->updated_at}}</td>
                                                    <td style="text-align: center">
                                                        @if($item->status ==1)
                                                            <span style="background-color: green;color: white; border-radius: 5px; padding: 5px"> Complete </span>
                                                        @else
                                                            <span style="background-color: red;color: white; border-radius: 5px; padding: 5px"> Incomplete</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('edit-hospital/'.$item->slug) }}" class="btn btn-secondary btn-xl" title="Edit Hospital">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                            <a href="{{ url('edit-image/'.$item->slug) }}" class="btn btn-primary btn-xl" title="Edit images">
                                                            <i class="fas fa-image"></i>
                                                        </a>
                                                        <a href="{{ url('edit-facilities/'.$item->slug) }}" class="btn btn-success btn-xl" title="Edit Facilities">
                                                            <i class="fas fa-building"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
</script>


@endsection


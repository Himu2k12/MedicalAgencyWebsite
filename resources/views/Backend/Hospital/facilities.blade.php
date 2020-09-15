@extends('Backend.master')

@section('title')
    Hospital Facilities
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
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">{{$hospital->hospital_name}} Facilities</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <nav class="divstyle border-bottom-success">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Facilities</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false">Existing Facilities</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Facilities Form</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ url('create-facilities') }}" enctype="multipart/form-data">
                                            @csrf
                                             <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Comfort During Stay') }}</label>
<input type="hidden" name="hospital_id" value="{{$hospital->id}}">
                                                <div class="col-md-10">
                                                    <textarea id="summernote" name="comfort">{!! old('comfort') !!}</textarea>
                                                    <span style="color: red;">{{ $errors->has('comfort') ? $errors->first('comfort') : ' ' }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Money Matters') }}</label>
                                                <div class="col-md-10">
                                                    <textarea id="summernote2" name="money">{!! old('money') !!}</textarea>
                                                    <span style="color: red;">{{ $errors->has('money') ? $errors->first('money') : ' ' }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Food') }}</label>
                                                <div class="col-md-10">
                                                    <textarea id="summernote4" name="food">{!! old('food') !!}</textarea>
                                                    <span style="color: red;">{{ $errors->has('food') ? $errors->first('food') : ' ' }}</span>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Transportation') }}</label>
                                                <div class="col-md-10">
                                                    <textarea id="summernote5" name="transport">{!! old('transport') !!}</textarea>
                                                    <span style="color: red;">{{ $errors->has('transport') ? $errors->first('transport') : ' ' }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Language') }}</label>
                                                <div class="col-md-3">
                                                    <textarea rows="5" class="form-control" name="language">{{old('language')}}</textarea>
                                                    <span style="color: red;">{{ $errors->has('language') ? $errors->first('language') : ' ' }}</span>
                                                </div>
                                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Treatment Related') }}</label>
                                                <div class="col-md-5">
                                                    <textarea rows="5" id="summernote3" class="form-control" name="treatment">{!! old('treatment') !!}</textarea>
                                                    <span style="color: red;">{{ $errors->has('treatment') ? $errors->first('treatment') : ' ' }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="col-md-2 offset-md-5 btn btn-primary">
                                                    {{ __('Save') }}
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
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Existing Facilities</h6>
                                        </div>
                                    </div>
                                    <div class="card-body row table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Hospital Name</th>
                                                <th>Money</th>
                                                <th>Food</th>
                                                <th>Transport</th>
                                                <th>Treatment</th>
                                                <th>Language</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($facilities as $item)
                                                <tr class="odd gradeX">
                                                    <td>{!!  $item->id !!}</td>
                                                    <td>{!! $item->hospital_name!!}</td>
                                                    <td>{!! $item->money!!}</td>
                                                    <td>{!! $item->food!!}</td>
                                                    <td>{!! $item->transport!!}</td>
                                                    <td>{!! $item->treatment!!}</td>
                                                    <td>{!! $item->language!!}</td>
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
            placeholder: 'Enter Comfort Related facilities here',
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
            placeholder: 'Enter Money Related facilities Here',
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
            placeholder: 'Enter language related facilities Here',
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
            placeholder: 'Enter Food related facilities Here',
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
        $('#summernote5').summernote({
            placeholder: 'Enter Transportation Here',
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


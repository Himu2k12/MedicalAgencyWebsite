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

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Available Treatment Under Department</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ url('create-hospital-second') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="hopital_id" value="{{$hospital->id}}">
                                            @foreach($department as $item)

                                            <div class="form-group row">
                                                <label  for="name" class="col-md-6 col-form-label text-md-left"><b>{{$treatmentOfDepartment->departmentName($item->department_id)->department}}</b></label>
                                            </div>
                                                <div class="form-group row">

                                                @php    $treatments=$treatmentOfDepartment->DepartmentTretments($item->department_id); @endphp


                                                    @foreach($treatments as $treatment)
                                                        <div class="col-sm-3">
                                                            <input type="checkbox" value="{{$treatment->id}}" name="treatment_id[]" > {{$treatment->treatment}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach

                                            <div class="form-group row mb-0">
                                                <button type="submit" class="col-md-2 offset-md-5 btn btn-primary">
                                                    {{ __('Save') }}
                                                </button>
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
@endsection


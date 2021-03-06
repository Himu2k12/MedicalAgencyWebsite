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
                                        <form method="POST" action="{{ url('create-hospital-brand') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Brand name') }}</label>

                                                <div class="col-md-6">
                                                    <input  required type="text" class="form-control @error('brand_name') is-invalid @enderror" value="{{old('brand_name')}}" name="brand_name"/>
                                                    @error('brand_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Brand Logo') }}</label>

                                                <div class="col-md-6">
                                                    <input  required type="file" accept="image/*" class="form-control @error('logo') is-invalid @enderror" name="logo"/>
                                                    @error('logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="col-md-2 offset-md-6 btn btn-primary">
                                                    {{ __('Create') }}
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
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">All Hospital Brands</h6>
                                        </div>
                                    </div>
                                    <div class="card-body row table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Hospital Brand</th>
                                                <th>Logo</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($hospitalBrands as $item)
                                                <tr class="odd gradeX">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->brand_name}}</td>
                                                    <td><img src="{{asset($item->logo)}}"></td>
                                                    <td>{{ $item->created_at}}</td>
                                                    <td>{{ $item->updated_at}}</td>
                                                    <td style="text-align: center">
                                                        @if($item->status ==1)
                                                            <span style="background-color: green;color: white; border-radius: 5px; padding: 5px"> Published </span>
                                                        @else
                                                            <span style="background-color: red;color: white; border-radius: 5px; padding: 5px"> Unpublished</span>
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <a href="{{ url('edit-hospital-brand/'.$item->slug) }}" class="btn btn-secondary btn-xl" title="Edit Brand">
                                                            <i class="fas fa-edit"></i>
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


@endsection


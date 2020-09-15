@extends('Backend.master')

@section('title')
    Create Category
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
                <h4 style="text-align: center" class="m-0 font-weight-bold text-primary">Create Category</h4>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="card mb-4 py-3 border-left-success">
                <div class="card-body">
                    <form method="POST" action="{{ url('create-category') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category name') }}</label>

                            <div class="col-md-6">
                                <input  required type="text" class="form-control @error('category') is-invalid @enderror" value="{{old('category')}}" name="category"/>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Logo') }}</label>

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
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="text-align: center" class="m-0 font-weight-bold text-primary">All Categories</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Logo</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->category}}</td>
                                <td><img src="{{$role->logo}}"></td>
                                <td>{{$role->created_at}}</td>
                                <td>{{$role->updated_at}}</td>
                                <td>
                                    @if($role->status==1)
                                        <a  class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                              <i class="fas fa-check"></i>
                                            </span>
                                            <span style="color: white"  class="text">{{$role->status==1?"Active": "Deactive"}}</span>
                                        </a>
                                    @else
                                        <a  class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                              <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span style="color: white" class="text">{{$role->status==1?"Active": "Deactive"}}</span>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($role->status ==1)
                                        <a href="{{ url('deactive-category/'.$role->slug) }}" class="btn btn-danger btn-xl" title="Disable">
                                            <i class="fas fa-arrow-circle-down"></i>
                                        </a>
                                    @else
                                        <a href="{{ url('/active-category/'.$role->slug) }}" class="btn btn-success btn-xl" title="Enable">
                                            <i class="fas fa-arrow-circle-up"></i>
                                        </a>
                                    @endif

                                    <a href="{{ url('/edit-category/'.$role->slug) }}" class="btn btn-primary btn-xl" title="Edit">
                                        <span><i class="fas fa-edit"></i></span>
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
    <!-- /.container-fluid -->


@endsection


@extends('Backend.master')

@section('title')
    Edit Hospital Brand
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
                <h4 style="text-align: center" class="m-0 font-weight-bold text-primary">Edit Hospital Brand</h4>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="card mb-4 py-3 border-left-success">
                <div class="card-body">
                    <form method="POST" action="{{ url('update-hospital-brand') }}" enctype="multipart/form-data" name="editform">
                        @csrf
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Hospital Brand ID') }}</label>
                            <div class="col-md-6">
                            <input readonly type="text" class="form-control" value="{{$editInfo->id}}">
                            <input type="hidden"  name="id" value="{{$editInfo->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Brand name') }}</label>

                            <div class="col-md-6">
                                <input  required type="text" class="form-control @error('brand_name') is-invalid @enderror" value="{{$editInfo->brand_name}}" name="brand_name"/>
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
                                <input type="file" accept="image/*" class="form-control @error('logo') is-invalid @enderror" name="logo"/>
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <img src="{{asset($editInfo->logo)}}" width="150px">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <div class="col-sm-9 form-group" >
                                    <select name="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="col-md-2 offset-md-6 btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- DataTales Example -->
    </div>
    <!-- /.container-fluid -->

    <script>
        document.forms['editform'].elements['status'].value = '{{$editInfo->status}}';
    </script>

@endsection


@extends('Backend.master')

@section('title')
    Edit City
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
                <h4 style="text-align: center" class="m-0 font-weight-bold text-primary">Edit City</h4>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="card mb-4 py-3 border-left-success">
                <div class="card-body">
                    <form method="POST" action="{{ url('update-city') }}" enctype="multipart/form-data" name="editForm">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City ID') }}</label>
                            <div class="col-md-6">
                                <div class="col-sm-9 form-group" >
                                    <input readonly type="number" class="form-control" value="{{$editInfo->id}}">
                                    <input type="hidden" name="id" value="{{$editInfo->id}}">
                                </div>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="row form-group">
                                <label class="col-md-4 col-form-label text-md-right">Country<span style="color: red">*</span></label>
                                <div class="col-sm-6">
                                    <div class="col-sm-9 form-group" >
                                    <select name="country_id" class="form-control">
                                        <option value="">Select Country Name</option>
                                        @foreach($country as $item)
                                            <option value="{{$item->id}}">{{$item->country}}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City Name') }}</label>
                            <div class="col-md-6">
                                <div class="col-sm-9 form-group" >
                                    <input  name="city" type="text" class="form-control" required="required" placeholder="City Name" value="{{$editInfo->city}}">
                                </div>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">
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
        document.forms['editForm'].elements['status'].value = '{{$editInfo->status }}';
        document.forms['editForm'].elements['country_id'].value = '{{$editInfo->country_id }}';
    </script>

@endsection


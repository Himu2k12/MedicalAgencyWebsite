@extends('Backend.master')

@section('title')
    Manage Treatment
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
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Edit Treatment</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="card-header py-12">
                            <div>
                                <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Edit Treatment</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{url('/update-treatment')}}" enctype="multipart/form-data" name="editForm">

                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-sm-3">Department<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group">

                                                <select name="department_id" class="form-control">
                                                    <option value="">Select Department Name</option>
                                                    @foreach($departments as $item)
                                                        <option value="{{$item->id}}">{{$item->department}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-sm-3">Treatment Name<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group" >
                                                <input  name="treatment" type="text" class="form-control" required="required" placeholder="Treatment Name" value="{{$treatment->treatment }}">
                                                <input  type="hidden" name="id" value="{{$treatment->id }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-sm-3">Status<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group">
                                                <select name="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Update"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script>
        document.forms['editForm'].elements['status'].value = '{{$treatment->status }}';
        document.forms['editForm'].elements['department_id'].value = '{{$treatment->department_id }}';
    </script>

@endsection

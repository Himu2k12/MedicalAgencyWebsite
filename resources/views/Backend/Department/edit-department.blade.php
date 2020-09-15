@extends('Backend.master')

@section('title')
    Manage Department
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
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Department</h5>
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
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Edit Department</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('/update-department')}}" name="editForm" enctype="multipart/form-data">

                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Department Name<span style="color: red">*</span></label>
                                                        <div class="col-sm-9 form-group" >
                                                            <input  name="department" type="text" class="form-control" required="required"  value="{{$departments->department}}">
                                                            <input  name="id" type="hidden" value="{{$departments->id}}">
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
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script>
        document.forms['editForm'].elements['status'].value = '{{$departments->status}}';
    </script>

@endsection

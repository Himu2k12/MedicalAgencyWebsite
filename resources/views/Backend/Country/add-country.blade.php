@extends('Backend.master')

@section('title')
    Manage Country
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
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Country</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <nav class="divstyle border-bottom-success">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Country</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false">All Countries</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Add Country</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('/create-country')}}" enctype="multipart/form-data">

                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Country Name<span style="color: red">*</span></label>
                                                        <div class="col-sm-9 form-group" >
                                                            <input  name="country" type="text" class="form-control" required="required" placeholder="Country Name" value="{{old('country')}}">
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
                                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Create"/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">All Countries</h6>
                                        </div>
                                    </div>
                                    <div class="card-body row table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                                            <thead>
                                            <tr>
                                                <th>Country ID</th>
                                                <th>Country Name</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($countries as $item)
                                                <tr class="odd gradeX">

                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->country}}</td>
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

                                                        <a href="{{ url('/edit-country/'.$item->slug) }}" class="btn btn-secondary btn-xl" title="Edit Country">
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

@extends('Backend.master')

@section('title')
    Images
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
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Hospital Image</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <nav class="divstyle border-bottom-success">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Image</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false">All images</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Add Image</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('store-image')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <!-- Basic Card Example -->
                                                    <div class="card shadow mb-4">
                                                        <div class="card-header py-3">
                                                            <h6 style="text-align: center" class="m-0 font-weight-bold text-success">Image Upload</h6>
                                                        </div>
                                                        <div class="card-body multiple-field">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                    <input type="hidden" name="hospital_id" value="{{$hospital->id}}">
                                                                </div>
                                                                <label for="Partial_payment" class="col-md-2 col-form-label text-md-right">{{ __('Insert Image') }}<span style="color: red">*</span></label>
                                                                <div class="col-md-4">
                                                                    <input id="fileName" min="0"  type="file" accept="image/*" class="form-control" name="document[]"  >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="offset-1 col-md-1" style="padding-bottom: 5px;">
                                                            <input id="add-field"  type="button" class="btn btn-info form-control" value="Add" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row mb-0">

                                                        <div class="col-md-5 offset-md-5">
                                                            <button  type="submit" class="btn btn-primary col-sm-4">
                                                                {{ __('Confirm') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- DataTales Example -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">All Images of {{$hospital->hospital_name}}</h6>
                                        </div>
                                    </div>
                                    <div class="card-body row table-responsive">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-info" style="text-align: center">Previous Images</h6>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-dark table-bordered">
                                                    <thead>
                                                    <tr>

                                                        <th style="text-align: center">ID</th>
                                                        <th style="text-align: center">Image Name</th>
                                                        <th style="text-align: center">Image</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=1; ?>
                                                    @foreach($files as $item)
                                                        <tr>
                                                            <td style="text-align: center">{{$item->id}}</td>
                                                            <td style="text-align: center">{{$item->hospital_name}}</td>
                                                            <td style="text-align: center"><img src="{{asset('websiteimages/'.$item->image)}}" width="200px" height="150px"></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="col-md-5">
                                                    <a href="{{url('view-bookings-by-id/')}}" >  <button  type="button" class="btn btn-warning col-sm-4">
                                                            {{ __('Back') }}
                                                        </button></a>
                                                </div>
                                            </div>
                                        </div>
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
        var total = 1;
        var addBlockId;
        $(document).on('click','#add-field',function () {
            addBlockId = total = total + 1;
            if(addBlockId>5){
                alert('You can not add More than 5 at once!');
                total = total - 1;
                return false;
            }

            var addBlock = document.createElement('div');
            $(addBlock).addClass('form-group row');
            $(addBlock).attr('id','repeatField-' + addBlockId);


            var inputDiv = document.createElement('div');
            $(inputDiv).addClass('col-md-3');
            $(inputDiv).attr('id','repeatField-' + addBlockId);
            $(inputDiv).appendTo($(addBlock));


            var fileNameLabel = document.createElement('label');
            $(fileNameLabel).attr('class','col-md-2 col-form-label text-md-right');
            $(fileNameLabel).attr('accept','images/*');
            $(fileNameLabel).text("Insert Image*");
            $(fileNameLabel).appendTo($(addBlock));

            var inputDiv2 = document.createElement('div');
            $(inputDiv2).addClass('col-md-4');
            $(inputDiv2).attr('id','repeatField-' + addBlockId);
            $(inputDiv2).appendTo($(addBlock));

            var inputfileName = document.createElement('input');
            $(inputfileName).attr('type','file');
            $(inputfileName).attr('class','form-control');
            $(inputfileName).attr('name','document[]');
            $(inputfileName).attr('id','fileName-' + addBlockId);
            $(inputfileName).appendTo($(inputDiv2));

            var button = document.createElement('button');
            $(button).attr('class','col-md-1 btn btn-danger form-control');
            $(button).attr('id','remove');
            $(button).attr('type','button');
            $(button).attr('onclick','remove('+addBlockId+')');
            $(button).text('X');
            $(button).appendTo($(addBlock));

            $(addBlock).appendTo($('.multiple-field'));

        })
        function remove(id){

            $("#repeatField-" + id).remove();
            total = total - 1;
        }

    </script>

@endsection


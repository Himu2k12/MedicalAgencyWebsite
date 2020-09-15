@extends('Backend.master')

@section('title')
    Create Comment
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
                <h4 style="text-align: center" class="m-0 font-weight-bold text-primary">Edit Category</h4>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="card mb-4 py-3 border-left-success">
                <div class="card-body">
                    <form method="POST" action="{{ url('update-category') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Category ID') }}</label>
                            <input readonly type="text" class="col-md-6 form-control" value="{{$editInfo->id}}">
                            <input type="hidden"  name="id" value="{{$editInfo->id}}">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category name') }}</label>

                            <div class="col-md-6">
                                <input  required type="text" class="form-control @error('category') is-invalid @enderror" value="{{$editInfo->category}}" name="category"/>
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
                                <input   type="file" accept="image/*" class="form-control @error('logo') is-invalid @enderror"  name="logo"/>
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img src="{{asset($editInfo->logo)}}" >
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
        $('#summernote').summernote({
            placeholder: 'Enter Comment here',
            tabsize: 4,
            height: 150,
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


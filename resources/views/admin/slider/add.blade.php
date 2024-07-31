@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

    <div class="content-wrapper"> 
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/slider/list') }}">Slider List</a></li>
                            <li class="breadcrumb-item active">Add New Slider</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/slider/list') }}" class="btn btn-outline-secondary"><i class="fa fa-backward"></i></a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title <span style="color:red">*</span> </label>
                                        <input type="text" class="form-control" name="title" id="" value="{{ old('title') }}" placeholder="Enter Title" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Image <span style="color:red">*</span> </label>
                                        <input type="file" class="form-control" name="image_name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Button Nmae <span style="color:red">*</span> </label>
                                        <input type="text" class="form-control" name="button_name" id="" value="{{ old('button_name') }}" placeholder="Enter Button Nmae" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Button Link <span style="color:red">*</span> </label>
                                        <input type="text" class="form-control" name="button_link" id="" value="{{ old('button_link') }}" placeholder="Enter Button Link" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Status <span style="color:red">*</span> </label>
                                        <select name="status" id="" class="form-control" required>
                                            <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                                            <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">In Active</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>


@endsection

@section('script')
@endsection
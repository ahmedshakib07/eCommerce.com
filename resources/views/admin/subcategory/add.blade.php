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
                            <li class="breadcrumb-item"><a href="{{ url('admin/sub_category/list') }}">Sub-Category List</a></li>
                            <li class="breadcrumb-item active">Add New Sub-Category</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/sub_category/list') }}" class="btn btn-primary"><i class="fa fa-backward"></i></a>
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
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category Name <span style="color:red">*</span> </label>
                                        <select class="form-control" name="category_id" id="">
                                            <option value="">Select</option>
                                            @foreach($getCategory as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Category Name <span style="color:red">*</span> </label>
                                        <input type="text" class="form-control" name="name" id="" value="{{ old('name') }}" placeholder="Enter Sub Category Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Slug <span style="color:red">*</span> </label>
                                        <input type="text" class="form-control" name="slug" id="" value="{{ old('slug') }}" placeholder="Enter Slug" required>
                                        <div style="color:red">{{ $errors->first('slug') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Status <span style="color:red">*</span> </label>
                                        <select name="status" id="" class="form-control" required>
                                            <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                                            <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">In Active</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Meta Title <span style="color:red">*</span> </label>
                                        <input type="text" class="form-control" name="meta_title" id="" value="{{ old('meta_title') }}" placeholder="Meta Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea id="" class="form-control" name="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta keywords</label>
                                        <input type="text" class="form-control" name="meta_keywords" id="" value="{{ old('meta_keywords') }}" placeholder="Meta keywords">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
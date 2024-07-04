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
                        <li class="breadcrumb-item"><a href="{{ url('admin/page/list') }}">Page List</a></li>
                        <li class="breadcrumb-item active">Edit Page</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/page/list') }}" class="btn btn-outline-secondary"><i class="fa fa-backward"></i></a>
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
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span style="color:red"></span> </label>
                                                <input type="text" class="form-control" name="name" id="" value="{{ $getRecord->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title <span style="color:red"></span> </label>
                                                <input type="text" class="form-control" name="title" id="" value="{{ $getRecord->title }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image <span style="color:red"></span> </label>
                                                <input type="file" class="form-control" name="image" id="">
                                                <br>
                                                @if(!empty($getRecord->getImage()))
                                                    <img style="width: 200px;" src="{{ $getRecord->getImage() }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description <span style="color:red"> </span> </label>
                                                <textarea class="form-control editor" name="description" id="">{{ $getRecord->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Short Description <span style="color:red"> </span> </label>
                                                <textarea class="form-control editor" name="short_description" id="">{{ $getRecord->short_description }}</textarea>
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description One <span style="color:red"> </span> </label>
                                                <textarea class="form-control editor" name="description_one" id="">{{ $getRecord->description_one }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description Two <span style="color:red"> </span> </label>
                                                <textarea class="form-control editor" name="description_two" id="">{{ $getRecord->description_two }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <hr class="mt-5 mb-5">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Meta Title <span style="color:red">*</span> </label>
                                                <input type="text" class="form-control" name="meta_title" id="" value="{{ old('meta_title', $getRecord->meta_title) }}" placeholder="Meta Title" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Meta keywords</label>
                                                <input type="text" class="form-control" name="meta_keywords" id="" value="{{ old('meta_keywords', $getRecord->meta_keywords) }}" placeholder="Meta keywords">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <textarea id="" class="form-control" name="meta_description" placeholder="Meta Description">{{ old('meta_description', $getRecord->meta_description) }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-dark">Update</button>
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
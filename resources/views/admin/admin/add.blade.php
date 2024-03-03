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
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/admin/list') }}">Admin List</a></li>
                            <li class="breadcrumb-item active">Add New Admin</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/admin/list') }}" class="btn btn-primary">Back</a>
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
                                        <label>Name <span style="color:red">*</span> </label>
                                        <input type="text" class="form-control" name="name" id="" value="{{ old('name') }}" placeholder="Enter Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Email address <span style="color:red">*</span> </label>
                                        <input type="email" class="form-control" name="email" id="" value="{{ old('email') }}" placeholder="Enter Email" required>
                                        <div style="color:red">{{ $errors->first('email') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Password <span style="color:red">*</span> </label>
                                        <input type="password" class="form-control" name="password" id="" placeholder="Password" required>
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
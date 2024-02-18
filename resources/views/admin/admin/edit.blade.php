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
                        <h1>Edit Admin</h1>
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
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" id="" value="{{ old('name', $getRecord->name) }}" placeholder="Enter Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" name="email" id="" value="{{ old('enail', $getRecord->email) }}" placeholder="Enter Email" required>
                                        <div style="color:red">{{ $errors->first('email') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" id="" placeholder="Password">
                                        <p>Du you want to change password so please add</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="" class="form-control" required>
                                            <option {{ ($getRecord->status == 0)? 'selected': ''}} value="0">Active</option>
                                            <option {{ ($getRecord->status == 1)? 'selected': ''}} value="1">In Active</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
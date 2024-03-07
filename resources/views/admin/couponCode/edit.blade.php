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
                        <li class="breadcrumb-item"><a href="{{ url('admin/coupon_code/list') }}">Coupon Code List</a></li>
                        <li class="breadcrumb-item active">Edit Coupon Code</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/coupon_code/list') }}" class="btn btn-outline-secondary"><i class="fa fa-backward"></i></a>
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
                                        <label>Coupon Code Name <span style="color:red">*</span> </label>
                                        <input type="text" class="form-control" name="name" id="" value="{{ old('name', $getRecord->name) }}" placeholder="Enter CouponCode Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Type <span style="color:red">*</span> </label>
                                        <select name="type" id="" class="form-control" required>
                                            <option {{ (old('type', $getRecord->type) == 'Amount') ? 'selected' : '' }} value="Amount">Amount</option>
                                            <option {{ (old('type', $getRecord->type) == 'Percent') ? 'selected' : '' }} value="Percent">Percent</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Percent / Amount <span style="color:red">*</span> </label>
                                        <input type="text" class="form-control" name="percent_amount" id="" value="{{ old('percent_amount', $getRecord->percent_amount) }}" placeholder="Enter Percent / Amount" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Exper Date <span style="color:red">*</span> </label>
                                        <input type="date" class="form-control" name="exper_date" id="" value="{{ old('exper_date', $getRecord->exper_date) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Status <span style="color:red">*</span> </label>
                                        <select name="status" id="" class="form-control" required>
                                            <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                                            <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">In Active</option>
                                        </select>
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
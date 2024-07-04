@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <li class="breadcrumb-item active">Coupon Code List</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/coupon_code/add') }}" class="btn btn-outline-info"><i class="fa fa-plus-circle"></i> Coupon Code</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Coupon Code List</h3>
                            </div>
                            
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Percent / Amount</th>
                                            <th>Exper Date</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->type }}</td>
                                                <td>{{ $value->percent_amount }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->exper_date)) }}</td>
                                                <td>{{ ($value->status == 0) ? 'Active': 'Inactive' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/coupon_code/edit/'.$value->id) }}" class="fa fa-edit"></a>
                                                    <a href="{{ url('admin/coupon_code/delete/'.$value->id) }}" class="fa fa-trash-o delete"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
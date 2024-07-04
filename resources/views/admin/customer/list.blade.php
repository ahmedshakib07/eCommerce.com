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
                        <li class="breadcrumb-item active">Customer List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Search -->
                        <form action="" method="get">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Search Customer ( Total: {{ $getRecord->total() }})</h3>
                                </div>
                                
                                <div class="card-body" style="overflow: auto;">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" placeholder="Name" name="name" class="form-control" value="{{ Request::get('name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" placeholder="email" name="email" class="form-control" value="{{ Request::get('email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">From Date</label>
                                                <input type="date" style="padding: 6px" name="from_date" class="form-control" value="{{ Request::get('from_date') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">To Date</label>
                                                <input type="date" style="padding: 6px" name="to_date" class="form-control" value="{{ Request::get('to_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button class="btn btn-primary">Search</button>
                                                <a href="{{ url('admin/customer/list') }}" class="btn btn-primary">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Search -->



                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Customer List</h3>
                            </div>
                            
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
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
                                            <td>{{ $value->email }}</td>
                                            <td>{{ ($value->status == 0) ? 'Active': 'Inactive' }}</td>
                                            <td>{{ date('d-m-y h:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="fa fa-trash-o delete"></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                
                                <div style="padding: 10px; float: right;">
                                    {!! $getRecord->appends (Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
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
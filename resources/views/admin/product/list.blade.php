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
                        <h1>Product List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/product/add') }}" class="btn btn-primary">Add New Product</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    
                        @include('admin.layouts._message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product List</h3>
                            </div>
                            
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->created_by_name }}</td>
                                                <td>{{ ($value->status == 0) ? 'Active': 'Inactive' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/product/edit/'.$value->id) }}" class="fa fa-edit"></a>
                                                    <a href="{{ url('admin/product/delete/'.$value->id) }}" class="fa fa-trash-o"></a>
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
        </section>
        <!-- /.content -->
    </div>


@endsection

@section('script')
@endsection
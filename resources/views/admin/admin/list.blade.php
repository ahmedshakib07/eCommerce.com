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
                        <li class="breadcrumb-item active">Admin List</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add New Admin</a>
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
                                <h3 class="card-title">Admin List</h3>
                            </div>
                            
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
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
                                            <td>
                                                <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="fa fa-edit"></a>
                                                <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="fa fa-trash-o delete"></a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.delete').on('click', function (e) {
        e.preventDefault();
        var self = $(this);
        console.log(self.data('title'));

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Admin has been deleted.",
                    icon: "success"
                });
                location.href = self.attr('href');
            }
        });
    })
</script>
@endsection
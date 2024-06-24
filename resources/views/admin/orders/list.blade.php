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
                        <li class="breadcrumb-item active">Orders list ( Total: {{ $getRecord->total() }})</li>
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
                                    <h3 class="card-title">Search Order</h3>
                                </div>
                                
                                <div class="card-body" style="overflow: auto;">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">ID</label>
                                                <input type="text" placeholder="ID" name="id" class="form-control" value="{{ Request::get('id') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input type="text" placeholder="phone" name="phone" class="form-control" value="{{ Request::get('phone') }}">
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
                                                <label for="">City</label>
                                                <input type="text" placeholder="city" name="city" class="form-control" value="{{ Request::get('city') }}">
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
                                                <a href="{{ url('admin/orders/list') }}" class="btn btn-primary">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Search -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders List</h3>
                            </div>
                            
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>

                                            <th>Name</th>
                                            <th>Company Name</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Post Code</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Coupon Code</th>
                                            <th>Coupon Amount</th>
                                            <th>Shipping Amount</th>
                                            <th>Total Amount</th>
                                            <th>Payment Method</th>

                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $value->firstName }} {{ $value->lastName }}</td>
                                                <td>{{ $value->companyName }}</td>
                                                <td>{{ $value->country }}</td>
                                                <td>{{ $value->address_one }} <br> {{ $value->address_two }}</td>
                                                <td>{{ $value->city }}</td>
                                                <td>{{ $value->state }}</td>
                                                <td>{{ $value->postcode }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->coupon_code }}</td>
                                                <td>{{ number_format($value->coupon_amount, 2) }}</td>
                                                <td>{{ number_format($value->shipping_amount, 2) }}</td>
                                                <td>{{ number_format($value->total_amount, 2) }}</td>
                                                <td style="text-transform: capitalize;">{{ $value->payment_method }}</td>

                                                <td>{{ ($value->status == 0) ? 'Active': 'Inactive' }}</td>
                                                <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/orders/detail/'.$value->id) }}" class="fa fa-eye"></a>
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
                    text: "Category has been deleted.",
                    icon: "success"
                });
                location.href = self.attr('href');
            }
        });
    })
</script>
@endsection
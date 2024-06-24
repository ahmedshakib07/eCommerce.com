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
                                                <label for="">Order Number</label>
                                                <input type="text" placeholder="Order Number" name="order_number" class="form-control" value="{{ Request::get('order_number') }}">
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

                                            <th>Order Number</th>
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

                                            <th>status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>

                                                <td>{{ $value->order_number }}</td>
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

                                                <td>
                                                    <select class="form-control ChangeStatus" name="" id="{{ $value->id }}" style="width: 110px;">
                                                        <option {{ ($value->status == 0) ? 'selected' : '' }} value="0"> Pending </option>
                                                        <option {{ ($value->status == 1) ? 'selected' : '' }} value="1"> In Progress </option>
                                                        <option {{ ($value->status == 2) ? 'selected' : '' }} value="2"> Delivered </option>
                                                        <option {{ ($value->status == 3) ? 'selected' : '' }} value="3"> Completed </option>
                                                        <option {{ ($value->status == 4) ? 'selected' : '' }} value="4"> Cancelled </option>
                                                    </select>
                                                </td>

                                                <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/orders/detail/'.$value->id) }}" class="fa fa-eye"></a>
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
<script>
$('body').delegate('.ChangeStatus', 'change', function() {
    var status = $(this).val();
    var order_id = $(this).attr('id');

    $.ajax({
        type: "GET",
        url: "{{ url('admin/order_status') }}",
        data: {
            status: status,
            order_id: order_id
        },
        dataType: "json",
        success: function(data) {
            alert(data.message);
        }
    });
});

</script>
@endsection
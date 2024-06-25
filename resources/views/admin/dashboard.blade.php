@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

    <div class="content-wrapper">
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- <h5 class="mb-2">Info Box</h5> -->
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Order</span>
                                <span class="info-box-number">{{ $TotalOrder }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="far fa-credit-card"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Amount</span>
                                <span class="info-box-number">$ {{ number_format($TotalAmount, 2) }}</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Today Payment</span>
                                <span class="info-box-number">$ {{ number_format($TodayPayment, 2) }}</span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Likes</span>
                                <span class="info-box-number">93,139</span>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

                <!-- =========================================================== -->
                
                <!-- <h5 class="mb-2 mt-4">Small Box</h5> -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $NewOrder }}</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="{{ url('admin/orders/list') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $TotalProduct }}<sup style="font-size: 20px"></sup></h3>

                            <p>Total Product</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('admin/product/list') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $UserRegistrations }}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{ url('admin/customer/list') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>
                    
                </div>
                
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Sales</h3>
                                        <select class="form-comtrol ChangeYear" style="width: 100px;" name="" id="">
                                            @for($i=2021; $i<=date('Y'); $i++)
                                                <option {{ ($year == $i) ? 'selected' : '' }} value="{{ $i }}"> {{ $i }} </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="d-flex flex-column">
                                            <span class="text-bold text-lg">${{ number_format($totalAmount, 2) }}</span>
                                            <span>Sales Over Time</span>
                                        </p>
                                    </div>
    
                                    <div class="position-relative mb-4">
                                        <canvas id="sales-chart-order" height="200"></canvas>
                                    </div>
    
                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-success"></i> Customer
                                        </span>
        
                                        <span class="mr-2">
                                            <i class="fas fa-square text-gray"></i> Orders
                                        </span>

                                        <span>
                                            <i class="fas fa-square text-info"></i> Amount
                                        </span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Latest Orders</h3>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>Order Number</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Coupon Code</th>
                                                <th>Coupon Amount</th>
                                                <th>Shipping Amount</th>
                                                <th>Total Amount</th>
                                                <th>Payment Method</th>

                                                <th>Created Date</th>
                                                <th>More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($LatestOrders as $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>{{ $value->order_number }}</td>
                                                    <td>{{ $value->firstName }} {{ $value->lastName }}</td>
                                                    <td>{{ $value->phone }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>{{ $value->coupon_code }}</td>
                                                    <td>{{ number_format($value->coupon_amount, 2) }}</td>
                                                    <td>{{ number_format($value->shipping_amount, 2) }}</td>
                                                    <td>{{ number_format($value->total_amount, 2) }}</td>
                                                    <td style="text-transform: capitalize;">{{ $value->payment_method }}</td>

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
                    
                </div>
            </div>

        </section>
        
    </div>
    

@endsection

@section('script')
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('public/assets/dist/js/pages/dashboard3.js') }}"></script>
    <script>
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        var $salesChart = $('#sales-chart-order')
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
            labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'JAN', 'FEB', 'MAR', 'APR', 'MAY'],
            datasets: [
                {
                backgroundColor: '#2bb366',
                borderColor: '#2bb366',
                data: [{{ $getTotalUserRegistrationsMonth }}]
                },
                {
                backgroundColor: '#c1c9c5',
                borderColor: '#c1c9c5',
                data: [{{ $getTotalOrderMonth }}]
                },
                {
                backgroundColor: '#36e0c4',
                borderColor: '#36e0c4',
                data: [{{ $getTotalAmountMonth }}]
                }
            ]
            },
            options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                // display: false,
                gridLines: {
                    display: true,
                    lineWidth: '4px',
                    color: 'rgba(0, 0, 0, .2)',
                    zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                    beginAtZero: true,

                    // Include a dollar sign in the ticks
                    callback: function (value) {
                    if (value >= 1000) {
                        value /= 1000
                        value += 'k'
                    }

                    return '$' + value
                    }
                }, ticksStyle)
                }],
                xAxes: [{
                display: true,
                gridLines: {
                    display: false
                },
                ticks: ticksStyle
                }]
            }
            }
        })


        $('.ChangeYear').change(function(){
            var year = $(this).val();
            window.location.href = "{{ url('admin/dashboard?year=') }}"+year;
        });
    </script>
@endsection
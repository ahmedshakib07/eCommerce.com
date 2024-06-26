@extends('layouts.app')
@section('style')

@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url(' {{ url('') }}/assets/images/page-header-bg.jpg'); padding: 1.6rem 0 2rem;">
        <div class="container">
            <h3 class="page-title">My Account</h3><span>Shop</span>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">

                    @include('user._sidebar')

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>Order Number</th>
                                        <th>Total Amount</th>
                                        <th>Payment Method</th>

                                        <th>status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($showOrders as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $value->order_number }}</td>
                                            <td>{{ number_format($value->total_amount, 2) }}</td>
                                            <td style="text-transform: capitalize;">{{ $value->payment_method }}</td>

                                            <td>
                                                @if($value->status == 0)
                                                    Pending
                                                @elseif($value->status == 1)
                                                    Inprogress
                                                @elseif($value->status == 2)
                                                    Delivered
                                                @elseif($value->status == 3)
                                                    Completed
                                                @elseif($value->status == 4)
                                                    Cancelled
                                                @endif
                                            </td>

                                            <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('user/orders/detail/'.$value->id) }}" class="icon-eye"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            
                            <div style="padding: 10px; float: right;">
                                {!! $showOrders->appends (Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>


@endsection
@section('script')

@endsection
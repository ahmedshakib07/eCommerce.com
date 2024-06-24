@extends('admin.layouts.app')
@section('style')
<style>
    .form-group{
        margin-bottom: 1px;
    }
</style>
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
                            <li class="breadcrumb-item"><a href="{{ url('admin/orders/list') }}">Orders List</a></li>
                            <li class="breadcrumb-item active">Order Detail</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/orders/list') }}" class="btn btn-outline-secondary"><i class="fa fa-backward"></i></a>
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
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ID: <span style="font-weight: normal;"> {{ $getRecord->id }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Transaction ID: <span style="font-weight: normal;"> {{ $getRecord->transaction_id }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Name: <span style="font-weight: normal;"> {{ $getRecord->firstName }} </span>  <span style="font-weight: normal;"> {{ $getRecord->lastName }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Company Name: <span style="font-weight: normal;"> {{ $getRecord->companyName }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Country: <span style="font-weight: normal;"> {{ $getRecord->country }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Address: <span style="font-weight: normal;"> {{ $getRecord->address_one }} </span>  , <span style="font-weight: normal;"> {{ $getRecord->address_two }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>City: <span style="font-weight: normal;"> {{ $getRecord->city }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>State: <span style="font-weight: normal;"> {{ $getRecord->state }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Post Code: <span style="font-weight: normal;"> {{ $getRecord->postcode }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Phone: <span style="font-weight: normal;"> {{ $getRecord->phone }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Email: <span style="font-weight: normal;"> {{ $getRecord->email }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Coupon Code: <span style="font-weight: normal;"> {{ $getRecord->coupon_code }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Coupon Amount ($): <span style="font-weight: normal;"> {{ number_format($getRecord->coupon_amount, 2) }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Name: <span style="font-weight: normal;"> {{ $getRecord->getShipping->name }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Amount ($): <span style="font-weight: normal;"> {{ number_format($getRecord->shipping_amount, 2) }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Total Amount ($): <span style="font-weight: normal;"> {{ number_format($getRecord->total_amount, 2) }} </span> </label>
                                </div>
                                <div class="form-group" style="text-transform: capitalize;">
                                    <label>Payment Method: <span style="font-weight: normal;"> {{ $getRecord->payment_method }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Note: <span style="font-weight: normal;"> {{ $getRecord->notes }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Status: </label>
                                </div>
                                <div class="form-group">
                                    <label>Created Date: <span style="font-weight: normal;"> {{ date('d-m-Y h:i A', strtotime($getRecord->created_at)) }} </span> </label>
                                </div>
                                
                            </div>

                        </div> 
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product Details</h3>
                            </div>
                            
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>size Amount</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord->getItem as $item)
                                            @php
                                                $getProductImage = $item->getProduct->getImageSingle($item->getProduct->id);
                                            @endphp
                                            <tr>
                                                <td> 
                                                    <img style="width: 100px;height: 100px;" src="{{ $getProductImage->getLogo() }}" alt=""> 
                                                </td>
                                                <td>
                                                    <a href="{{ url($item->getProduct->slug) }}" target="_blank">{{ $item->getProduct->title }}</a>
                                                </td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->size_name }}</td>
                                                <td>{{ $item->color_name }}</td>
                                                <td>{{ number_format($item->size_amount, 2) }}</td>
                                                <td>{{ number_format($item->total_price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
@extends('layouts.app')
@section('style')
<style>
    .form-group{
        margin-bottom: 1px;
    }
</style>
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url(' {{ url('') }}/assets/images/page-header-bg.jpg'); padding: 1.6rem 0 2rem;">
        <div class="container">
            <h3 class="page-title">My Account</h3>
            <a href="{{ url('') }}"><i class="icon-home"></i></a><span> / </span>
            <span>Order Details</span>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">My Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
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

                            <div class="">
                                <div class="form-group">
                                    <label>ID: <span style="font-weight: normal;"> {{ $showOrdersdetails->order_number }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Name: <span style="font-weight: normal;"> {{ $showOrdersdetails->firstName }} </span>  <span style="font-weight: normal;"> {{ $showOrdersdetails->lastName }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Company Name: <span style="font-weight: normal;"> {{ $showOrdersdetails->companyName }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Country: <span style="font-weight: normal;"> {{ $showOrdersdetails->country }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Address: <span style="font-weight: normal;"> {{ $showOrdersdetails->address_one }} </span>  , <span style="font-weight: normal;"> {{ $showOrdersdetails->address_two }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>City: <span style="font-weight: normal;"> {{ $showOrdersdetails->city }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>State: <span style="font-weight: normal;"> {{ $showOrdersdetails->state }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Post Code: <span style="font-weight: normal;"> {{ $showOrdersdetails->postcode }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Phone: <span style="font-weight: normal;"> {{ $showOrdersdetails->phone }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Email: <span style="font-weight: normal;"> {{ $showOrdersdetails->email }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Coupon Code: <span style="font-weight: normal;"> {{ $showOrdersdetails->coupon_code }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Coupon Amount ($): <span style="font-weight: normal;"> {{ number_format($showOrdersdetails->coupon_amount, 2) }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Name: <span style="font-weight: normal;"> {{ $showOrdersdetails->getShipping->name }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Amount ($): <span style="font-weight: normal;"> {{ number_format($showOrdersdetails->shipping_amount, 2) }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Total Amount ($): <span style="font-weight: normal;"> {{ number_format($showOrdersdetails->total_amount, 2) }} </span> </label>
                                </div>
                                <div class="form-group" style="text-transform: capitalize;">
                                    <label>Payment Method: <span style="font-weight: normal;"> {{ $showOrdersdetails->payment_method }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Note: <span style="font-weight: normal;"> {{ $showOrdersdetails->notes }} </span> </label>
                                </div>
                                <div class="form-group">
                                    <label>Status: 
                                        @if($showOrdersdetails->status == 0)
                                            Pending
                                        @elseif($showOrdersdetails->status == 1)
                                            Inprogress
                                        @elseif($showOrdersdetails->status == 2)
                                            Delivered
                                        @elseif($showOrdersdetails->status == 3)
                                            Completed
                                        @elseif($showOrdersdetails->status == 4)
                                            Cancelled
                                        @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Created Date: <span style="font-weight: normal;"> {{ date('d-m-Y h:i A', strtotime($showOrdersdetails->created_at)) }} </span> </label>
                                </div>
                                
                            </div>

                            <div class="card">
                                <div class="card-header" style="margin-top: 20px;">
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
                                                <th>size Amount</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($showOrdersdetails->getItem as $item)
                                                @php
                                                    $getProductImage = $item->getProduct->getImageSingle($item->getProduct->id);
                                                @endphp
                                                <tr>
                                                    <td> 
                                                        <img style="width: 100px;height: 100px;" src="{{ $getProductImage->getLogo() }}" alt=""> 
                                                    </td>
                                                    <td style="max-width: 250px">
                                                        <a href="{{ url($item->getProduct->slug) }}" target="_blank">{{ $item->getProduct->title }}</a>
                                                        <br>

                                                        @if(!empty($item->size_name))
                                                        <b>Size:</b> {{ $item->size_name }}
                                                        @endif
                                                        <br>

                                                        @if(!empty($item->color_name))
                                                        <b>Color:</b> {{ $item->color_name }}
                                                        @endif
                                                        <br>

                                                        @if($showOrdersdetails->status == 3)
                                                            @php
                                                                $getReview = $item->getReview($item->getProduct->id, $item->id);
                                                            @endphp

                                                            @if(!empty($getReview))
                                                                <b>Rating:</b> {{ $getReview->rating }} <br>
                                                                <b>Review:</b> {{ $getReview->review }}

                                                            @else
                                                                <button class="btn btn-primary makeReview" id="{{ $item->getProduct->id }}" data-order="{{ $item->id }}">Make Review</button>
                                                            @endif

                                                            @php
                                                                $getReview = $item->getReview($item->getProduct->id, $item->id);
                                                            @endphp
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->price }}</td>
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
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="makeReviewModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Make Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('user/make-review') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" id="getProductId" require>
                <input type="hidden" name="order_id" id="getOrderId" require>
                <div class="modal-body" style="padding: 20px">
                    <div class="form-group" style="margin-bottom: 10px;">
                        <label for="">How many rating? *</label>
                        <select name="rating" id="" class="form-control" require>
                            <option value="">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Review *</label>
                        <textarea name="review" id="" class="form-control" require></textarea>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('script')
<script>
    $('body').delegate('.makeReview', 'click', function() {
        var product_id = $(this).attr('id');
        var order_id = $(this).attr('data-order');

        $('#getProductId').val(product_id);
        $('#getOrderId').val(order_id);

        $('#makeReviewModalCenter').modal('show');
    });
</script>
@endsection
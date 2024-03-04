@extends('layouts.app')
@section('style')
@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg'); padding: 1.6rem 0 2rem;">
        <div class="container">
            <h3 class="page-title">Cart</h3>
            <a href="{{ url('') }}"><i class="icon-home"></i></a><span> / Cart</span>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="cart">
            <div class="container">
                @if(!empty(Cart::getContent()->count()))
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach(Cart::getContent() as $cart)
                                        @php
                                            $getCartProduct = App\Models\ProductModel::getSingle($cart->id);
                                        @endphp

                                        @if(!empty($getCartProduct))

                                            @php
                                                $getProductImage = $getCartProduct->getImageSingle($getCartProduct->id);
                                            @endphp

                                            <tr>
                                                <td class="product-col">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="{{ url($getCartProduct->slug) }}">
                                                                <img src="{{ $getProductImage->getLogo() }}" alt="Product image">
                                                            </a>
                                                        </figure>

                                                        <h3 class="product-title">
                                                            <a href="{{ url($getCartProduct->slug) }}">{{ $getCartProduct->title }}</a>
                                                        </h3>
                                                    </div>
                                                </td>
                                                <td class="price-col">${{ number_format($cart->price, 2) }}</td>
                                                <td class="quantity-col">
                                                    <div class="cart-product-quantity">
                                                        <input type="number" class="form-control" value="{{ $cart->quantity }}" min="1" max="10" step="1" data-decimals="0" required>
                                                    </div>
                                                </td>
                                                <td class="total-col">${{ number_format($cart->price * $cart->quantity, 2) }}</td>
                                                <td class="remove-col"><a href="{{ url('cart/delete/'.$cart->id) }}" class="btn-remove"><i class="icon-close"></i></a></td>
                                            </tr>

                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" required placeholder="coupon code">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
                            </div>
                        </div>
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3>

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>${{ number_format(Cart::getSubTotal(), 2) }}</td>
                                        </tr>
                                        <tr class="summary-shipping">
                                            <td>Shipping:</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                                </div>
                                            </td>
                                            <td>$0.00</td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                                </div>
                                            </td>
                                            <td>$0.00</td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="express-shipping">Express:</label>
                                                </div>
                                            </td>
                                            <td>$0.00</td>
                                        </tr>

                                        <!-- <tr class="summary-shipping-estimate">
                                            <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                            <td>&nbsp;</td>
                                        </tr> -->

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>${{ number_format(Cart::getSubTotal(), 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            </div>

                            <a href="{{ url('') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside>
                    </div>
                @else
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Your Cart Is Empty !</h3>
                        <!-- <h6 class="mt-3">Add Items to it now.</h6> -->
                        <span class="mt-3">Add Items to it now.</span> <br>
                        <a href="{{ url('') }}" class="btn btn-primary mt-4">Shop Now</a>
                    </div>
                </div>
                    <!-- <a href="{{ url('') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a> -->
                @endif
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')
@endsection
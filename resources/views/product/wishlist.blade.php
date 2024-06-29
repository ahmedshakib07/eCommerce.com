@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
    <style type="text/css">
        .active-color {
            border: 2px solid #000 !important;
        }
    </style>
@endsection
@section('content')


<main class="main">
    <div class="page-header text-center" style="background-image: url(' {{ url('') }}/assets/images/page-header-bg.jpg'); padding: 1.6rem 0 2rem;">
        <div class="container">
            <h3 class="page-title">My Wishlist</span></h3>
            <a href="{{ url('') }}"><i class="icon-home"></i></a><span> / Shop</span>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javaScript:;">Shop</a></li>
                <li class="breadcrumb-item"><a href="javaScript:;">My Wishlist</a></li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span>{{ $getProduct->perPage() }} of {{ $getProduct->total() }}</span> Products
                            </div>
                        </div>
                    </div>

                    <div id="getProductAjax">
                        @include('product._list')
                    </div>
                    <div style="padding: 10px; float: right;">
                        {!! $getProduct->appends (Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
@section('script')

@endsection
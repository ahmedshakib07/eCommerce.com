@extends('layouts.app')
@section('style')
<style>
    .card {
        width: 250px;
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        transition: 0.3s ease; /* smooth transition */
    }
    .card:hover {
        background-color:#c2e0d8; /* lighter red on hover */
    }
    .card-content {
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .card-content .info {
        text-align: left;
    }
    .card-content .info .number {
        font-size: 33px;
        /* font-weight: bold; */
    }
    .card-content .info .text {
        font-size: 15px;
    }
    .card-footer {
        background-color: #008c99;
        padding: 10px;
        text-align: center;
        font-size: 16px;
        border-top: 1px solid #007a87;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card-footer a {
        color: white;
        text-decoration: none;
    }
    .card-footer a:hover {
        text-decoration: underline;
    }
</style>
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url(' {{ url('') }}/assets/images/page-header-bg.jpg'); padding: 1.6rem 0 2rem;">
        <div class="container">
            <h3 class="page-title">My Account</h3>
            <a href="{{ url('') }}"><i class="icon-home"></i></a><span> / </span>
            <span>Edit Profile</span>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">My Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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

                            <form action="#" method="post">
                                {{ csrf_field() }}
                                <!-- <h2 class="checkout-title">Billing Details</h2> -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name <span style = "color:red">*</span></label>
                                        <input type="text" name="Name" value="{{ $getUser->name }}" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Last Name <span style = "color:red">*</span></label>
                                        <input type="text" name="lastName" value="{{ $getUser->lastName }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Email address <span style = "color:red">*</span></label>
                                        <input type="email" name="email" value="{{ $getUser->email }}" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Phone <span style = "color:red">*</span></label>
                                        <input type="tel" name="phone" value="{{ $getUser->phone }}" class="form-control" required>
                                    </div>
                                </div>

                                <label>Company Name (Optional)</label>
                                <input type="text" name="companyName" value="{{ $getUser->companyName }}" class="form-control">

                                <label>Country <span style = "color:red">*</span></label>
                                <input type="text" name="country" value="{{ $getUser->country }}" class="form-control" required>

                                <label>Street address <span style = "color:red">*</span></label>
                                <input type="text" name="address_one" value="{{ $getUser->address_one }}" class="form-control" placeholder="House number and Street name" required>
                                <input type="text" name="address_two" value="{{ $getUser->address_two }}" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Town / City <span style = "color:red">*</span></label>
                                        <input type="text" name="city" value="{{ $getUser->city }}" class="form-control" required>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>State <span style = "color:red">*</span></label>
                                        <input type="text" name="state" value="{{ $getUser->state }}" class="form-control" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Postcode / ZIP <span style = "color:red">*</span></label>
                                        <input type="text" name="postcode" value="{{ $getUser->postcode }}" class="form-control" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-dark btn-order btn-block" style="width: 100px">
                                    <span class="btn-text">Update</span>
                                    <span class="btn-hover-text">Submit</span>
                                </button>
                            </form>

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
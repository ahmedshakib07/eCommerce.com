@extends('layouts.app')
@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="javaScript:;">Pages</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">{{ $getPage->title }}</li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('{{ $getPage->getImage() }}')">
            <h1 class="page-title text-white">{{ $getPage->title }}<span class="text-white">keep in touch with us</span></h1>
        </div>
    </div>

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <!-- <h2 class="title mb-1">Contact Information</h2>
                    <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p> -->
                    {!! $getPage->description !!}
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="contact-info">
                                <h3>The Office</h3>

                                <ul class="contact-list">
                                    @if(!empty($getSystemSetting->office_address))
                                        <li>
                                            <i class="icon-map-marker"></i>
                                            {{ $getSystemSetting->office_address }}
                                        </li>
                                    @endif
                                    
                                    @if(!empty($getSystemSetting->phone))
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="tel:{{ $getSystemSetting->phone }}">{{ $getSystemSetting->phone }}</a>
                                        </li>
                                    @endif
                                    
                                    @if(!empty($getSystemSetting->email))
                                        <li>
                                            <i class="icon-envelope"></i>
                                            <a href="mailto:{{ $getSystemSetting->email }}">{{ $getSystemSetting->email }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="contact-info" style="padding-top: 40px;">
                                <!-- <h3>The Office</h3> -->
                                <ul class="contact-list">
                                    @if(!empty($getSystemSetting->office_day))
                                        <li>
                                            <i class="icon-clock-o"></i>
                                            <span class="text-dark">{{ $getSystemSetting->office_day }}</span> 
                                            <br>{{ $getSystemSetting->office_time }}
                                        </li>
                                    @endif
                                    @if(!empty($getSystemSetting->office_weekend))
                                        <li>
                                            <i class="icon-calendar"></i>
                                            <span class="text-dark">{{ $getSystemSetting->office_weekend }}
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-6">
                    <h2 class="title mb-1">Got Any Questions?</h2>
                    <p class="mb-2">Use the form below to get in touch with the sales team</p>

                    <form action="" class="contact-form mb-3" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cname" class="sr-only">Name</label>
                                <input type="text" class="form-control" name="name" id="cname" placeholder="Name *" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="cemail" class="sr-only">Email</label>
                                <input type="email" class="form-control" name="email" id="cemail" placeholder="Email *" required>
                            </div>
                        </div><!-- End .row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cphone" class="sr-only">Phone</label>
                                <input type="tel" class="form-control" name="phone" id="cphone" placeholder="Phone">
                            </div>

                            <div class="col-sm-6">
                                <label for="csubject" class="sr-only">Subject</label>
                                <input type="text" class="form-control" name="subject" id="csubject" required placeholder="Subject">
                            </div>
                        </div><!-- End .row -->

                        <label for="cmessage" class="sr-only">Message</label>
                        <textarea class="form-control" cols="30" rows="4" name="message" id="cmessage" required placeholder="Message *"></textarea>

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="verification">{{ $first_number }} + {{ $second_number }} = ?</label>
                                <input type="text" class="form-control" name="verification" id="verification" placeholder="Verification Number">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                            <span>SUBMIT</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- <hr class="mt-4 mb-5">

            <div class="stores mb-4 mb-lg-5">
                <h2 class="title text-center mb-3">Our Stores</h2>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="assets/images/stores/img-1.jpg" alt="image">
                                    </figure>
                                </div>
                                <div class="col-sm-7 col-xl-6">
                                    <div class="store-content">
                                        <h3 class="store-title">Wall Street Plaza</h3>
                                        <address>88 Pine St, New York, NY 10005, USA</address>
                                        <div><a href="tel:#">+1 987-876-6543</a></div>

                                        <h4 class="store-subtitle">Store Hours:</h4>
                                        <div>Monday - Saturday 11am to 7pm</div>
                                        <div>Sunday 11am to 6pm</div>

                                        <a href="#" class="btn btn-link" target="_blank"><span>View Map</span><i class="icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="assets/images/stores/img-2.jpg" alt="">
                                    </figure>
                                </div>

                                <div class="col-sm-7 col-xl-6">
                                    <div class="store-content">
                                        <h3 class="store-title">One New York Plaza</h3>
                                        <address>88 Pine St, New York, NY 10005, USA</address>
                                        <div><a href="tel:#">+1 987-876-6543</a></div>

                                        <h4 class="store-subtitle">Store Hours:</h4>
                                        <div>Monday - Friday 9am to 8pm</div>
                                        <div>Saturday - 9am to 2pm</div>
                                        <div>Sunday - Closed</div>

                                        <a href="#" class="btn btn-link" target="_blank"><span>View Map</span><i class="icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- <div id="map"></div> -->
    </div>
</main>

@endsection
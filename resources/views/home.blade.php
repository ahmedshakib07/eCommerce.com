@extends('layouts.app')
@section('content')

<main class="main">
    <div class="intro-section bg-lighter pt-3 pb-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                        @php
                            $getCategoryHeader = App\Models\CategoryModel::getRecordActive();
                        @endphp
                        @foreach($getCategoryHeader as $value_category_header)

                        <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "responsive": {
                                    "768": {
                                        "nav": true
                                    }
                                }
                            }'>
                            <!-- slider image -->
                                @foreach($getSlider as $slider)
                                    @if(!empty($slider->getImage()))
                                        <div class="intro-slide">
                                            <figure class="slide-image">
                                                <picture>
                                                    <source media="(max-width: 480px)" srcset="{{ $slider->getImage() }}">
                                                    <img src="{{ $slider->getImage() }}" alt="Image Desc">
                                                </picture>
                                            </figure>

                                            <div class="intro-content">
                                                <h3 class="intro-subtitle">{!! $slider->intro_subtitle !!}</h3>
                                                <h1 class="intro-title">{!! $slider->title !!}</h1>

                                                @if(!empty($slider->button_link) && !empty($slider->button_name))
                                                <a href="{{ $slider->button_link }}" class="btn btn-outline-white">
                                                    <span>{{ $slider->button_name }}</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            <!-- slider image End -->

                        </div>
                        
                        <span class="slider-loader"></span>
                        @endforeach
                    </div>
                </div>

                <!-- Clearence -->
                    <div class="col-lg-4">
                        <div class="intro-banners">
                            <div class="row row-sm">
                                <div class="col-md-6 col-lg-12">
                                    <div class="banner banner-display">
                                        <a href="#">
                                            <img src="assets/images/banners/home/intro/banner-1.jpg" alt="Banner">
                                        </a>

                                        <div class="banner-content">
                                            <h4 class="banner-subtitle text-darkwhite"><a href="#">Clearence</a></h4>
                                            <h3 class="banner-title text-white"><a href="#">Chairs & Chaises <br>Up to 40% off</a></h3>
                                            <a href="#" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="banner banner-display mb-0">
                                        <a href="#">
                                            <img src="assets/images/banners/home/intro/banner-2.jpg" alt="Banner">
                                        </a>

                                        <div class="banner-content">
                                            <h4 class="banner-subtitle text-darkwhite"><a href="#">New in</a></h4>
                                            <h3 class="banner-title text-white"><a href="#">Best Lighting <br>Collection</a></h3>
                                            <a href="#" class="btn btn-outline-white banner-link">Discover Now<i class="icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Clearence End -->
            </div>

            <!-- Brand/Partner -->
                @if(!empty($getPartner->count()))
                    <div class="mb-6"></div>

                    <div class="owl-carousel owl-simple" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                        @foreach($getPartner as $partner)
                            @if(!empty($partner->getImage()))
                                <a href="{{ !empty($partner->button_link) ? $partner->button_link : '#' }}" class="brand">
                                    <img src="{{ $partner->getImage() }}" alt="Brand Name">
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            <!-- Brand/Partner End -->
        </div>
    </div>

    <!-- Trendy Products -->
        <div class="mb-6"></div>
        @if(!empty($getTrendyProducts->count()))
        <div class="container">
            <div class="heading heading-center mb-3">
                <h2 class="title-lg">Trendy Products</h2>
            </div>

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        @foreach($getTrendyProducts as $value)
                            @php
                                $getProductImage = $value->getImageSingle($value->id);
                            @endphp
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <!-- <span class="product-label label-new">New</span> -->
                                    <a href="{{ url($value->slug) }}">
                                        @if(!empty($getProductImage) && !empty($getProductImage->getLogo()))
                                            <img style="height: 280px;width: 100%; object-fit: cover;" src="{{ $getProductImage->getLogo() }}" alt="{{ $value->title }}" class="product-image">
                                        @endif
                                    </a>

                                    <div class="product-action-vertical">
                                        @if(!empty(Auth::check()))
                                            <a href="javascript:;" data-toggle="modal" id="{{ $value->id }}" class="addToWishlist addToWishlist{{ $value->id }} btn-product-icon btn-wishlist btn-expandable {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }}" title="Wishlist"><span>add to wishlist</span></a>
                                        @else
                                            <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to wishlist</span></a>
                                        @endif
                                        <!-- <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a> -->
                                    </div>

                                    <!-- <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div> -->
                                </figure>

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                                    </div>
                                    <h3 class="product-title"><a href="{{ url($value->slug) }}">{{ $value->title }}</a></h3>
                                    <div class="product-price">
                                        ${{ number_format($value->price, 2) }}
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{ $value->getReviewRating($value->id) }}%;"></div>
                                        </div>
                                        <span class="ratings-text">( {{ $value->getTotalReview() }} Reviews )</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    <!-- Trendy Products End -->

    <!-- Shop by Categories -->
        @if(!empty($getCategory->count()))
            <div class="container categories pt-6">
                <h2 class="title-lg text-center mb-4">Shop by Categories</h2>

                <div class="row">
                    @foreach($getCategory as $category)
                        @if(!empty($category->getImage()))
                            <div class="col-sm-12 col-lg-4 banners-sm">
                                <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                                    <a href="{{ url($category->slug) }}">
                                        <img src="{{ $category->getImage() }}" alt="{{ $category->name }}">
                                    </a>

                                    <div class="banner-content banner-content-center">
                                        <h3 class="banner-title text-white">
                                            <a href="{{ url($category->slug) }}">{{ $category->name }}</a>
                                        </h3>

                                        @if(!empty($category->button_name))
                                            <a href="{{ url($category->slug) }}" class="btn btn-outline-white banner-link">{{ $category->button_name }}<i class="icon-long-arrow-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mb-5"></div>
        @endif
    <!-- Shop by Categories End -->

    <!-- Recent Arrivals -->
        <div class="container">
            <div class="heading heading-center mb-6">
                <h2 class="title">Recent Arrivals</h2>

                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                    </li>
                    @foreach($getCategory as $category)
                        <li class="nav-item">
                            <a class="nav-link getCategoryProduct" data-val="{{ $category->id }}" id="top-{{ $category->slug }}-link" data-toggle="tab" href="#top-{{ $category->slug }}-tab" role="tab" aria-controls="top-{{ $category->slug }}-tab" aria-selected="false">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                    <div class="products">
                        @php
                            $is_home = 1;
                        @endphp
                        @include('product._list')
                    </div>

                    <div class="more-container text-center">
                        <a href="{{ url('search') }}" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
                    </div>
                </div>

                @foreach($getCategory as $category)
                    <div class="tab-pane p-0 fade getCategoryProduct{{ $category->id }}" id="top-{{ $category->slug }}-tab" role="tabpanel" aria-labelledby="top-{{ $category->slug }}-link">
                        

                    </div>
                @endforeach
            </div>
        </div>
    <!-- Recent Arrivals End -->

    <div class="container">

        <hr class="mt-5 mb-5">
        
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-rocket"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Payment & Delivery</h3>
                        <p>Free shipping for orders over $50</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-rotate-left"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Return & Refund</h3>
                        <p>Free 100% money back guarantee</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-life-ring"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Quality Support</h3>
                        <p>Alway online feedback 24/7</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-2"></div>
    </div>
    <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
        <div class="container">
            <h2 class="title-lg text-center mb-3 mb-md-4">From Our Blog</h2>

            <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "items": 3,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "600": {
                            "items":2
                        },
                        "992": {
                            "items":3
                        }
                    }
                }'>
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/home/post-1.jpg" alt="image desc">
                        </a>
                    </figure>

                    <div class="entry-body pb-4 text-center">
                        <div class="entry-meta">
                            <a href="#">Nov 22, 2018</a>, 0 Comments
                        </div>

                        <h3 class="entry-title">
                            <a href="single.html">Sed adipiscing ornare.</a>
                        </h3>

                        <div class="entry-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit.<br>Pelletesque aliquet nibh necurna. </p>
                            <a href="single.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </article>

                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/home/post-2.jpg" alt="image desc">
                        </a>
                    </figure>

                    <div class="entry-body pb-4 text-center">
                        <div class="entry-meta">
                            <a href="#">Dec 12, 2018</a>, 0 Comments
                        </div>

                        <h3 class="entry-title">
                            <a href="single.html">Fusce lacinia arcuet nulla.</a>
                        </h3>

                        <div class="entry-content">
                            <p>Sed pretium, ligula sollicitudin laoreet<br>viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis justo. </p>
                            <a href="single.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </article>

                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/home/post-3.jpg" alt="image desc">
                        </a>
                    </figure>

                    <div class="entry-body pb-4 text-center">
                        <div class="entry-meta">
                            <a href="#">Dec 19, 2018</a>, 2 Comments
                        </div>

                        <h3 class="entry-title">
                            <a href="single.html">Quisque volutpat mattis eros.</a>
                        </h3>

                        <div class="entry-content">
                            <p>Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. </p>
                            <a href="single.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </article>
            </div>
        </div><!-- container -->

        <div class="more-container text-center mb-0 mt-3">
            <a href="blog.html" class="btn btn-outline-darker btn-more"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
        </div>
    </div>
    <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url(assets/images/backgrounds/cta/bg-6.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-8">
                    <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                        <div class="col">
                            <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3>
                            <p class="cta-desc text-white">Molla presents the best in interior design</p>
                        </div>

                        <div class="col-auto">
                            <a href="login.html" class="btn btn-outline-white"><span>SIGN UP</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')
<script>
    $('body').delegate('.getCategoryProduct', 'click', function() { 
        var category_id = $(this).attr('data-val');
        $.ajax({
            url: "{{ url('recent_arrival_category_product') }}",
            type: "POST",
            data:{
                "_token": "{{ csrf_token() }}",
                category_id:category_id,
            },
            dataType:"json",
            success:function(response) {
                $('.getCategoryProduct'+category_id).html(response.success)
            },
        });
    });
</script>
@endsection
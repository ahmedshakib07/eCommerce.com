<div class="products mb-3">
    <div class="row justify-content">
        @foreach($getProduct as $value)

        @php
            $getProductImage = $value->getImageSingle($value->id);
        @endphp
            <div class="col-12 col-md-4 col-lg-4">
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <!-- <span class="product-label label-new">New</span> -->
                        <a href="{{ url($value->slug) }}">
                            @if(!empty($getProductImage) && !empty($getProductImage->getLogo()))
                                <img style="height: 280px;width: 100%; object-fit: cover;" src="{{ $getProductImage->getLogo() }}" alt="{{ $value->title }}" class="product-image">
                            @endif
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
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
                                <div class="ratings-val" style="width: 20%;"></div>
                            </div>
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
    {!! $getProduct->appends (Illuminate\Support\Facades\Request::except('page'))->links() !!}
    </ul>
</nav> -->
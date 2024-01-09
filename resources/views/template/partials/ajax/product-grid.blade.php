<div class="row">
    @foreach ($products as $product)
    <div id="productGrid" class="col-lg-4 col-md-6 col-12">
        <!-- Start Single Product -->
       
            <div class="single-product">
                <div class="d-flex flex-row align-items-start">
                    @if ($product->is_new || ($product->ofert && $product->ofert->percent))

                        <div class="product-image"  >
                       
                            <img  src="{{$product->image}}"
                            alt="Imagen Producto"> 
                            <span class="new-tag">{{ $product->is_new == 1 ? 'New' : '' }}</span>

                            @if ($product->ofert && $product->ofert->percent)
                            <span 
                            @if($product->is_new) 
                             class="sale-tag " style="margin-left:45px"
                            @endif
                            >-{{ $product->ofert->percent }}%</span>
                            @endif
                        </div>  
                    @endif
                </div>
                <div class="product-info">
                    <span class="category">{{ $product->category->description }}</span>
                    <h4 class="title">
                        <a
                            href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
                    </h4>
                    <div class="price">

                        @if ($product->ofert)
                            <span>${{ $product->price - $product->price * ($product->ofert->percent / 100) }}</span>
                            <span class="discount-price">${{ $product->price }}</span>
                        @else
                            <span class="price">${{ $product->price }}</span>
                        @endif
                    </div>
                    <div class="price">
                        @if ($product->quantity <= $product->quantity_alert)
                            <span class="price">En Stock: {{ $product->quantity }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- End Single Product -->
        </div>
        @endforeach
</div>
<div class="row">
    <div class="col-12">
        <!-- Pagination -->
        <div class="pagination left">
            <ul class="pagination-list">
               {{ $products->links() }}
            </ul>
        </div>
        <!--/ End Pagination -->
    </div>
</div>



    {{-- <div class="col-lg-12 col-md-12 col-12">
        <!-- Start Single Product -->
        <div class="single-product">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="product-image">
                        <img src="assets/images/products/product-2.jpg" alt="#">
                        <span class="sale-tag">-25%</span>
                        <div class="button">
                            <a href="product-details.html" class="btn"><i
                                    class="lni lni-cart"></i> Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="product-info">
                        <span class="category">Speaker</span>
                        <h4 class="title">
                            <a href="product-grids.html">Big Power Sound Speaker</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$275.00</span>
                            <span class="discount-price">$300.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product -->
    </div>
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Start Single Product -->
        <div class="single-product">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="product-image">
                        <img src="assets/images/products/product-3.jpg" alt="#">
                        <div class="button">
                            <a href="product-details.html" class="btn"><i
                                    class="lni lni-cart"></i> Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="product-info">
                        <span class="category">Camera</span>
                        <h4 class="title">
                            <a href="product-grids.html">WiFi Security Camera</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$399.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product -->
    </div>
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Start Single Product -->
        <div class="single-product">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="product-image">
                        <img src="assets/images/products/product-4.jpg" alt="#">
                        <span class="new-tag">New</span>
                        <div class="button">
                            <a href="product-details.html" class="btn"><i
                                    class="lni lni-cart"></i> Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="product-info">
                        <span class="category">Phones</span>
                        <h4 class="title">
                            <a href="product-grids.html">iphone 6x plus</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$400.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product -->
    </div>
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Start Single Product -->
        <div class="single-product">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="product-image">
                        <img src="assets/images/products/product-7.jpg" alt="#">
                        <span class="sale-tag">-50%</span>
                        <div class="button">
                            <a href="product-details.html" class="btn"><i
                                    class="lni lni-cart"></i> Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="product-info">
                        <span class="category">Headphones</span>
                        <h4 class="title">
                            <a href="product-grids.html">PX7 Wireless Headphones</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><span>4.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$100.00</span>
                            <span class="discount-price">$200.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Single Product -->
    {{-- </div> --}}
</div>



{{-- @foreach ($result as $product)
<div id="productGrid" class="col-lg-4 col-md-6 col-12">
    <div class="single-product">
        <div class="d-flex flex-row align-items-start">

            @if ($product->is_new || ($product->ofert && $product->ofert->percent))

            <div class="product-image"  >
           
                <img  src="{{$product->image}}"
                alt="Imagen Producto"> 
                <span class="new-tag">{{ $product->is_new == 1 ? 'New' : '' }}</span>

                @if ($product->ofert && $product->ofert->percent)
                <span 
                @if($product->is_new) 
                 class="sale-tag " style="margin-left:45px"
                @endif
                >-{{ $product->ofert->percent }}%</span>
                @endif
            </div>
           
    
    @endif

        </div>
        <div class="product-info">
            <span class="category">{{ $product->category->description }}</span>
            <h4 class="title">
                <a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
            </h4>
            <div class="price">

                @if ($product->ofert)
                    <span>${{ $product->price - $product->price * ($product->ofert->percent / 100) }}</span>
                    <span class="discount-price">${{ $product->price }}</span>
                @else
                    <span class="price">${{ $product->price }}</span>
                @endif
            </div>
            <div class="price">
                @if ($product->quantity <= $product->quantity_alert)
                    <span class="price">En Stock: {{ $product->quantity }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach --}}

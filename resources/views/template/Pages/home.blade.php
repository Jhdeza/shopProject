@extends('template.template')
@section('content')
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg- col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            @foreach ($commonInfo['products'] as $product)
                                <div class="single-slider" style="background-image: url(assets/images/hero/slider-bg1.jpg);">
                                    <div class="content">
                                        <h2>
                                            {{ $product->name }}

                                        </h2>
                                        <p>{{ $product->description }}</p>
                                        <h3><span>@lang('main.price'):</span> {{ $product->price }}</h3>
                                        <!-- <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div> -->
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->

                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-12"> -->
                <!-- <div class="row"> -->
                <!-- <div class="col-lg-12 col-md-6 col-12 md-custom-padding"> -->
                <!-- Start Small Banner -->
                <!-- <div class="hero-small-banner"
                                style="background-image: url('assets/images/hero/slider-bnr.jpg');">
                                <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>$259.99</h3>
                                </div>
                            </div> -->
                <!-- End Small Banner -->
                <!-- </div> -->
                <!-- <div class="col-lg-12 col-md-6 col-12"> -->
                <!-- Start Small Banner -->
                <!-- <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 50% off all online store items this week.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Shop Now</a>
                                    </div>
                                </div>
                            </div> -->
                <!-- Start Small Banner -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </section>
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Categories</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    @foreach ($commonInfo['categories'] as $category)
                        <div class="single-category">
                            <h3 class="heading"><a href="{{ route('Product-grids' ,['category' => $category->id]) }}">{{ $category->name }} 
                              </a></h3>
                            <ul>
                                @if ($category->subcategories->isNotEmpty())
                                @foreach ($category->subcategories as $sub)
                                    <li><a href="{{ route('Product-grids', ['category' => $sub->parent_id, 'subcategory' => $sub->id]) }}">{{ $sub->name }}</a>
                                    </li>
                                @endforeach
                                @endif
                                {{-- <li><a href="product-grids.html">QLED TV</a></li>
                        <li><a href="product-grids.html">Audios</a></li>
                        <li><a href="product-grids.html">Headphones</a></li>
                        <li><a href="product-grids.html">View All</a></li> --}}
                            </ul>
                            <div class="images">
                                <img src="assets/images/featured-categories/fetured-item-1.png" alt="#">
                            </div>
                        </div>
                    @endforeach
                    <!-- End Single Category -->
                </div>
            
            </div>
        </div>
    </section>
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Product</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($commonInfo['productosMasVistos'] as $prod)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        @if ($prod->is_new || ($prod->ofert && $prod->ofert->percent))
                        <div class="product-image">
                            <img src="{{$prod->image}}" alt="#">
                            <span class="new-tag">{{ $prod->is_new == 1 ? 'New' : '' }}</span>

                            @if ($prod->ofert && $prod->ofert->percent)
                            <span 
                            @if($prod->is_new) 
                             class="sale-tag " style="margin-left:45px"
                            @endif
                            >-{{ $prod->ofert->percent }}%</span>
                            @endif
                          </div>
                          @endif
                        <div class="product-info">
                            <span class="category">{{$prod->category->name}}</span>
                            <h4 class="title">
                                <a href="product-grids.html">{{$prod->name}}</a>
                            </h4>
                           
                            <div class="price">
                                @if ($prod->ofert)
                                <span>${{ $prod->price - $prod->price * ($prod->ofert->percent / 100) }}</span>
                                <span class="discount-price">${{ $prod->price }}</span>
                            @else
                                <span>${{ $prod->price }}</span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                @endforeach

               
            </div>
        </div>
    </section>
   
@endsection

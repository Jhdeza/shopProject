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
         </div>
        </div>
    </section>
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{__('main.featuredcategories')}}</h2>
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
                            <h3 class="heading"><a   href="{{ route('Product-grids',['slug' => $category->slug]) }}" >
                                {{ $category->name }} 
                              </a></h3>
                            <ul>
                                @if ($category->subcategories->isNotEmpty())
                                @foreach ($category->subcategories as $sub)
                                    <li><a  href="{{ route('Product-grids',['slug' => $sub->parent->slug, 'sub_slug' => $sub->slug]) }}" >
                                        {{ $sub->name }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                   </ul>
                            
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
                        <h2>{{__('main.trendingproduct')}}</h2>
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
                        <div class="product-image">
                            <img src="{{$prod->image}}" alt="#">

                            @if ($prod->is_new || ($prod->ofert && $prod->ofert->percent))
                            <span class="new-tag">{{ $prod->is_new == 1 ? 'New' : '' }}</span>
                            
                            @endif
                            @if ($prod->ofert && $prod->ofert->percent)
                            <span  class="sale-tag " @if($prod->is_new) style="margin-left:45px" @endif>
                                -{{ $prod->ofert->percent }}%
                            </span>
                            @endif
                          </div>
                        <div class="product-info">
                            <span class="category">{{$prod->category->name}}</span>
                            <h4 class="title">
                                <a href="{{ route('product-details', $prod->id) }}">{{$prod->name}}</a>
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

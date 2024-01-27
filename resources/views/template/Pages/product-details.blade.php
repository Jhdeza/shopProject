@extends('template.template')
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ $product->name }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('Product-grids') }}">{{ __('main.productgrid') }}</a></li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    @foreach ($product->galery as $image)
                                        @if ($image->is_main)
                                            <img src="{{ asset($image->url) }}" class="main-image"
                                                alt="imagen producto principal">
                                        @endif
                                    @endforeach
                                </div>

                                <div class="images">
                                    @foreach ($product->galery as $image)
                                        @if (!$image->is_main)
                                            <img src="{{ asset($image->url) }}" class="img thumbnail" alt="imagen producto"
                                                data-image="{{ asset($image->url) }}">
                                        @endif
                                    @endforeach
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->name }}</h2>

                            <p class="category"><i class="lni lni-tag"></i>
                                <a href="{{ route('Product-grids', ['slug' => $product->category->slug]) }}">{{ $product->category->name }}:

                                </a>
                            </p>

                            <div class="price">
                                @if ($product->ofert)
                                    <h3 class="price">
                                        ${{ number_format($product->price - $product->price * ($product->ofert->percent / 100), 2, '.', '') }}<span>${{ number_format($product->price, 2, '.', '') }}</span>
                                    </h3>
                                @else
                                    <h3 class="price">${{ number_format($product->price, 2, '.', '') }}</h3>
                                @endif
                            </div>

                            <p class="info-text">{{ $product->description }}</p>
                            
                        </div>
                        <div class="price">
                            @if ($product->quantity <= $product->quantity_alert)
                                <span class="price">En Stock: {{ $product->quantity }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>@lang('main.details')</h4>
                                <p>{!! $product->details !!}</p>
                                <h4>Features</h4>
                                <ul class="features">
                                    <li>Capture 4K30 Video and 12MP Photos</li>
                                    <li>Game-Style Controller with Touchscreen</li>
                                    <li>View Live Camera Feed</li>
                                    <li>Full Control of HERO6 Black</li>
                                    <li>Use App for Dedicated Camera Operation</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-body">
                                <h4>Specifications</h4>
                                <ul class="normal-list">
                                    <li><span>Weight:</span> 35.5oz (1006g)</li>
                                    <li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
                                    <li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
                                    <li><span>Operating Frequency:</span> 2.4GHz</li>
                                    <li><span>Manufacturer:</span> GoPro, USA</li>
                                </ul>
                                <h4>Shipping Options:</h4>
                                <ul class="normal-list">
                                    <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                                    <li><span>Local Shipping:</span> up to one week, $10.00</li>
                                    <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                                    <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                                        </div>
                                    </div>
                                </div> -->
            </div>
        </div>

    </section>

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>
@endsection


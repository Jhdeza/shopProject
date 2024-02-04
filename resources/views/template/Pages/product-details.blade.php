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


                            <div class="price">
                                @if ($product->quantity <= $product->quantity_alert)
                                    <span class="price">En Stock: {{ $product->quantity }}</span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    @foreach ($result as $res)
                                        <label class="title-label" for="size">{{ $res['name'] }}</label>
                                        <div class="d-flex flex-wrap">
                                            @foreach ($res['values'] as $value)
                                                <div class="form-group color-option align-items-center mr-4 mb-3 radio-option">
                                                    <div class="single-radio radio-style-1">
                                                        <input type="radio" id="radio-{{ $value['id'] }}" 
                                                               name="radio-group-{{ $res['id'] }}" class="radio-input">

                                                        <label for="radio-{{ $value['id'] }}" class="radio-label">
                                                            {{ $value['name'] }}
                                                            
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-12">                                                           
                                <div class="form-group quantity">
                                    <label class="title-label">Quantity:</label>
                                    <div class="form-control">
                                        @if(!$stock) 
                                        <span id="cantidad">{{$product->stock}} </span>
                                        @else
                                        <span id="cantidad">{{$stock}} </span>
                                        @endif
                                    </div>
                                </div>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>@lang('main.details')</h4>
                                <p>{!! $product->details !!}</p>
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

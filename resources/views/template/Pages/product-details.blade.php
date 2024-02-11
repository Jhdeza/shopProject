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
                                @if ($product->ofert && $product->ofert->active && $product->ofert->Type == 'PERCENT')
                                    <h3 class="price">
                                        ${{ number_format($product->price - $product->price * ($product->ofert->value / 100), 2, '.', '') }}
                                        <span>${{ number_format($product->price, 2, '.', '') }}</span>
                                    </h3>
                                @elseif($product->ofert && $product->ofert->value && $product->ofert->active)
                                    <h3 class="price">
                                        ${{ number_format($product->price - $product->ofert->value, 2, '.', '') }}
                                        <span>${{ number_format($product->price, 2, '.', '') }}</span>
                                    </h3>
                                @else
                                    <h3 class="price">${{ number_format($product->price, 2, '.', '') }}</h3>
                                @endif
                            </div>

                            <p class="info-text">{{ $product->description }}</p>
                            <h4 class="title">Marca:
                                <span class="info-text">{{ $product->branch ? $product->branch->name : '' }}</span>
                            </h4>
                            <h4 class="title">Modelo:
                                <span class="info-text"> {{ $product->models ? $product->models->name : '' }} </span>
                            </h4>


                            @if ($product->type == 'VARIABLE')
                                <div class="row">
                                    <form id="chars-form" action={{ route('product-details-stock', $product) }}
                                        method="GET">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            @foreach ($result as $res)
                                                <label class="title-label" for="size">{{ $res['name'] }}</label>
                                                <div class="d-flex flex-wrap">
                                                    @foreach ($res['values'] as $value)
                                                        <div
                                                            class="form-group color-option align-items-center mr-4 mb-3 radio-option">
                                                            <div class="single-radio radio-style-1">
                                                                <input type="radio" id="radio-{{ $value['id'] }}"
                                                                    value="{{ $res['id'] . '-' . $value['id'] }}"
                                                                    name="values[]" class="radio-input">
                                                                <label {{-- for="radio-{{ $value['id'] }}" --}}
                                                                    class="radio-label radio-label-act">
                                                                    {{ $value['name'] }} </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </form>
                                </div>
                            @endif
                            <div class="col-lg-3 col-md-3 col-3">
                                <div class="form-group quantity">

                                    <label @class(['title-label', 'd-none' => $product->quantity == 0]) id="title">@lang('main.stock1'):</label>

                                    <div class="form-control">
                                        {{--    @if ($product->quantity > $product->quantity_alert)
                                        
                                            <span id="cantidad">@lang('main.stock')</span>
                                        @elseif($product->quantity === 0)
                                            <span id="cantidad">Agotado</span>
                                        @elseif($product->quantity <= $product->quantity_alert)
                                         --}}
                                        <span id="cantidad">{{ $stock }}</span>
                                        {{--   @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($product->details)
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
            @endif
        </div>
        </div>
        </div>
        </div>

    </section>

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>
@endsection

@extends('template.template')
@section('content')
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg- col-12 custom-padding-right">
                    <div class="slider-head">

                        <div class="hero-slider">

                            @foreach ($commonInfo['products'] as $product)
                                <div class="single-slider " style="background-image: url({{ asset($product->image) }}); background-size:contain; background-position:90%;" >
                                    <div class="content">
                                        <h2><a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
                                        </h2>
                                        <p>{{ $product->description }}</p>
                                        <h3>
                                            <span>@lang('main.price'):</span>
                                            <div class="price d-flex  align-items-baseline">
                                                @if ($product->ofert)
                                                    <h3>${{ number_format($product->price - $product->price * ($product->ofert->percent / 100), 2, '.', '') }}
                                                    </h3>
                                                    <h4 class="text-decoration-line-through "
                                                        style="color: grey; margin-left: 15px">
                                                        ${{ number_format($product->price, 2, '.', '') }}</h4>
                                                @else
                                                    <h3 class="price">${{ number_format($product->price, 2, '.', '') }}
                                                    </h3>
                                                @endif
                                            </div>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach

                        </div>

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
                        <h2>{{ __('main.featuredcategories') }}</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">

                    @foreach ($commonInfo['categories'] as $category)
                        <div class="single-category">
                            <h3 class="heading"><a href="{{ route('Product-grids', ['slug' => $category->slug]) }}">
                                    {{ $category->name }}
                                </a></h3>
                            <ul>
                                @if ($category->subcategories->isNotEmpty())
                                    @foreach ($category->subcategories as $sub)
                                        <li><a
                                                href="{{ route('Product-grids', ['slug' => $sub->parent->slug, 'sub_slug' => $sub->slug]) }}">
                                                {{ $sub->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                            <div class="images">
                                @if ($category->image)
                                <img src="{{ asset($category->image->url) }}" alt="{{ $category->name }}">
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ __('main.trendingproduct') }}</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($commonInfo['productosMasVistos'] as $prod)
                    <div class="col-lg-3 col-md-6 col-6">

                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ $prod->image }}" alt="{{ $prod->name }}">

                                @if ($prod->is_new || ($prod->ofert && $prod->ofert->percent && $prod->ofert->active))
                                    <span class="new-tag">{{ $prod->is_new == 1 ? 'New' : '' }}</span>
                                @endif
                                @if ($prod->ofert && $prod->ofert->percent && $prod->ofert->active)
                                    <span class="sale-tag "
                                        @if ($prod->is_new) style="margin-left:45px" @endif>
                                        -{{ $prod->ofert->percent }}%
                                    </span>
                                @endif
                            </div>
                            <div class="product-info">
                                <span class="category">{{ $prod->category->name }}</span>
                                <h4 class="title">
                                    <a href="{{ route('product-details', $prod->id) }}">{{ $prod->name }}</a>
                                </h4>

                                <div class="price">
                                    @if ($prod->ofert)
                                        <span>${{ number_format($prod->price - $prod->price * ($prod->ofert->percent / 100), 2, '.', '') }}</span>
                                        <span class="discount-price">${{ number_format($prod->price, 2, '.', '') }}</span>
                                    @else
                                        <span>${{ number_format($prod->price, 2, '.', '') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection

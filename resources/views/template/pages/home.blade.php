@extends('template.template')
@section('content')
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg- col-12 custom-padding-right">
                    <div class="slider-head">
                        <div class="hero-slider">
                            @foreach ($commonInfo['products'] as $product)
                                <div class="single-slider "
                                    style="background-image: url({{ asset($product->image) }}); background-size:contain; background-position:90%;">
                                    <div class="content ml-2 ml-md-0">
                                        <h2><a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
                                        </h2>
                                        <p>{{ $product->description }}</p>
                                        <h3>
                                            <span>@lang('main.price'):</span>
                                            <div class="price d-flex  align-items-baseline">
                                                @if ($product->ofert && $product->ofert->active && $product->ofert->Type == 'PERCENT')
                                                    <h3>${{ number_format($product->price - $product->price * ($product->ofert->value / 100), 2, '.', '') }}
                                                    </h3>
                                                    <h4 class="text-decoration-line-through "
                                                        style="color: grey; margin-left: 15px">
                                                        ${{ number_format($product->price, 2, '.', '') }}</h4>
                                                @elseif($product->ofert && $product->ofert->value && $product->ofert->active)
                                                    <h3>${{ number_format($product->price - $product->ofert->value, 2, '.', '') }}
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
                        <p>Descubre nuestras diversas categorías de productos para vehículos, que van desde repuestos de
                            motor y transmisión hasta sistemas de escape y accesorios de iluminación.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                @php
                    $visible = $catVistas->slice(0, 6);
                    $hidden = $catVistas->slice(6);

                @endphp



                @foreach ($visible as $category)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-category"
                            @foreach ($categorias as $categoria)
                        style="height: {{ $categoria->id == $categoriaMaxSubcategorias->id ? $categoria->subcategories->count() * 33 : 'auto' }}px;" @endforeach>
                            <h3 class="heading"><a href="{{ route('Product-grids', ['slug' => $category->slug]) }}">
                                    {{ $category->name }}</a></h3>
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

                    </div>
                @endforeach

                <div class="row px-0" id="hidden-categories" style="display: none; flex-wrap: wrap;">
                    @foreach ($hidden as $category)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-category"
                                @foreach ($categorias as $categoria)
                                  style="height: {{ $categoria->id == $categoriaMaxSubcategorias->id ? $categoria->subcategories->count() * 33 : 'auto' }}px;" 
                                  @endforeach
                                  >
                                <h3 class="heading"><a href="{{ route('Product-grids', ['slug' => $category->slug]) }}">
                                        {{ $category->name }}</a></h3>
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
                        </div>
                    @endforeach
                </div>




                <div class="row  justify-content-center">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center text-center mt-3 ">
                        <button id="show-hidden-categories" class="btn btn-outline-warning"> <span>Ver mas categorías
                            </span> <i class="lni lni-chevron-right"></i></button>
                    </div>
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
                        <p>Explora nuestra sección de productos más populares, donde encontrarás desde baterías hasta kits
                            de frenos de, para mantener tu vehículo en la carretera
                            con un rendimiento óptimo.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($commonInfo['productosMasVistos'] as $prod)
                    <div class="col-lg-3 col-md-6 col-6">

                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ $prod->image }}" alt="{{ $prod->name }}">

                                @if ($prod->is_new || ($prod->ofert && $prod->ofert->value && $prod->ofert->active))
                                    <span class="new-tag">{{ $prod->is_new == 1 ? 'New' : '' }}</span>
                                @endif
                                @if ($prod->ofert && $prod->ofert->value && $prod->ofert->active && $prod->ofert->Type == 'PERCENT')
                                    <span class="sale-tag "
                                        @if ($prod->is_new) style="margin-left:45px" @endif>
                                        - {{ $prod->ofert->value }}%
                                    </span>
                                @elseif ($prod->ofert && $prod->ofert->value && $prod->ofert->active)
                                    <span class="sale-tag "
                                        @if ($prod->is_new) style="margin-left:45px" @endif>

                                        - {{ number_format(($prod->ofert->value / $prod->price) * 100, 0, '.', '') }}%
                                    </span>
                                @endif
                            </div>
                            <div class="product-info">
                                <span class="category">{{ $prod->category->name }}</span>
                                <h4 class="title">
                                    <a href="{{ route('product-details', $prod->id) }}">{{ $prod->name }}</a>
                                </h4>

                                <div class="price">
                                    @if ($prod->ofert && $prod->ofert->active && $prod->ofert->Type == 'PERCENT')
                                        <span>${{ number_format($prod->price - $prod->price * ($prod->ofert->value / 100), 2, '.', '') }}</span>
                                        <span class="discount-price">${{ number_format($prod->price, 2, '.', '') }}</span>
                                    @elseif($prod->ofert && $prod->ofert->value && $prod->ofert->active)
                                        <span>${{ number_format($prod->price - $prod->ofert->value, 2, '.', '') }}</span>
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

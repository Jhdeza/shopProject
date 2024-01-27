@extends('template.template')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ __('main.productgrid') }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>{{ __('main.productgrid') }}</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="product-grids section">
        @if (($products && $products->count() > 0) ||
            (request()->routeIs('productGrid') && request()->filled('category') && request()->filled('filter')))
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="product-grids-head">
                            <div class="product-grid-topbar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-8 col-12">
                                        <div class="product-sorting">
                                            <label for="sorting">{{ __('main.sortby') }}:</label>
                                            <select class="form-control" id="sorting">
                                                <option>Selecione</option>
                                                <option>Low - High Price</option>
                                                <option>High - Low Price</option>
                                                <option>A - Z Order</option>
                                                <option>Z - A Order</option>
                                            </select>
                                            <h3 class="total-show-product">{{ __('main.showing') }}:
                                                <span id="pagination-info">{{ $products->firstItem() }} -
                                                    {{ $products->lastItem() }} de {{ $products->total() }} Productos</span>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-12">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-grid" type="button" role="tab"
                                                    aria-controls="nav-grid" aria-selected="true"><i
                                                        class="lni lni-grid-alt"></i></button>
                                                <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-list" type="button" role="tab"
                                                    aria-controls="nav-list" aria-selected="false"><i
                                                        class="lni lni-list"></i></button>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                    aria-labelledby="nav-grid-tab">
                                    @include('template.partials.ajax.product-grid')
                                </div>
                                <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                    @include('template.partials.ajax.product-list')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @include('template.partials.notfound')
        @endif
    </section>
    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>
@endsection
@section('js')
    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
@endsection

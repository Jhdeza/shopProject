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
                        {{-- @include('template.partials.ajax.product-grid') --}}
                        <div class="row">

                            @foreach ($products as $product)
                            <div id="productGrid" class="col-lg-3 col-md-6 col-6">
                                    <div class="single-product">
                                        <div class="d-flex flex-row align-items-start">
                                            <div class="product-image">
                                                <img src="{{ request()->is('productGrid/*') ? '/' . $product->image  : $product->image }}" alt="Imagen Producto">
                                                @if ($product->is_new || ($product->ofert && $product->ofert->percent && $product->ofert->active))
                                                    <span class="new-tag">{{ $product->is_new == 1 ? 'New' : '' }}</span>
                                                    @endif
                                                    @if ($product->ofert && $product->ofert->percent && $product->ofert->active)
                                                        <span class="sale-tag"
                                                            @if ($product->is_new)  style="margin-left:45px" @endif>
                                                            -{{ $product->ofert->percent }}%
                                                        </span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <span class="category">{{ $product->category->description }}</span>
                                            <h4 class="title">
                                                <a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
                                            </h4>
                                            <div class="price">
                                                @if ($product->ofert)
                                                    <span>${{ number_format($product->price - ($product->price * ($product->ofert->percent / 100)), 2, '.', '') }}</span>
                                                    <span class="discount-price">${{ number_format($product->price, 2, '.', '') }}</span>
                                                @else
                                                    <span class="price">${{ number_format($product->price, 2, '.', '') }}</span>
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
                                @endforeach 
                                
                                
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="pagination left" id="pagination" >
                                    <ul  class="pagination-list">
                                        {{ $products->links() }}    
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                        {{-- @include('template.partials.ajax.product-list') --}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                @foreach ($products as $product)
                                    <div class="single-product">
                                        <div class="row align-items-start">
                                            <div class="col-lg-4 col-md-4 col-8">
                                                <div class="d-flex ">
                                                    <div class="product-image">
                                                        <img src= "{{ request()->is('productGrid/*') ? '/' . $product->image  : $product->image }}" alt="Imagen Producto">
                                                        @if ($product->is_new || ($product->ofert && $product->ofert->percent && $product->ofert->active))
                                                            <span class="new-tag">{{ $product->is_new == 1 ? 'New' : '' }}</span>
                                                        @endif
                                                       @if($product->ofert && $product->ofert->percent && $product->ofert->active)
                                                            <span class="sale-tag "
                                                                @if ($product->is_new)  style="margin-left:45px" @endif>-{{ $product->ofert->percent }}%</span>
                                                       
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <div class="product-info">
                                                    <span class="category">{{ $product->category->description }}</span>
                                                    <h4 class="title">
                                                        <a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
                                                    </h4>
                                                    <div class="price">
                                                        @if ($product->ofert)
                                                            <span>${{ number_format($product->price - $product->price * ($product->ofert->percent / 100), 2, '.', '')}}</span>
                                                            <span class="discount-price">${{number_format($product->price, 2, '.', '') }}</span>
                                                        @else
                                                            <span class="price">${{number_format($product->price, 2, '.', '') }}</span>
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
                                    </div>
                                    @endforeach
                                </div> 
                        </div>
                        
                        <div class="row">
                            <div class="col-12"> 
                                <div class="pagination left" id="pagination" >
                                    <ul  class="pagination-list">
                                        {{ $products->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
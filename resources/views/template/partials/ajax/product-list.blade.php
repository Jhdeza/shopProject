<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        @foreach ($products as $product)
        @if($product->prod_actv)
            <div class="single-product">
                <div class="row align-items-start">
                    <div class="col-lg-4 col-md-4 col-8">
                        <div class="d-flex ">
                            <div class="product-image">
                                <img src= "{{ request()->is('productGrid/*') ? '/' . $product->image : $product->image }}"
                                    alt="Imagen Producto">
                                @if ($product->is_new || ($product->ofert && $product->ofert->value && $product->ofert->active))
                                    <span class="new-tag">{{ $product->is_new == 1 ? 'New' : '' }}</span>
                                @endif
                                @if ($product->ofert && $product->ofert->value && $product->ofert->active && $product->ofert->Type == 'PERCENT')
                                    <span class="sale-tag "
                                        @if ($product->is_new) style="margin-left:45px" @endif>
                                        - {{ $product->ofert->value }}%
                                    </span>
                                @elseif ($product->ofert && $product->ofert->value && $product->ofert->active)
                                    <span class="sale-tag "
                                        @if ($product->is_new) style="margin-left:45px" @endif>

                                        - {{ number_format(($product->ofert->value / $product->price) * 100, 0, '.', '') }}%
                                    </span>
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
                                @if ($product->ofert && $product->ofert->active && $product->ofert->Type == 'PERCENT')
                                    <span>${{ number_format($product->price - $product->price * ($product->ofert->value / 100), 2, '.', '') }}</span>
                                    <span
                                        class="discount-price">${{ number_format($product->price, 2, '.', '') }}</span>
                                @elseif($product->ofert && $product->ofert->value && $product->ofert->active)
                                    <span>${{ number_format($product->price - $product->ofert->value, 2, '.', '') }}</span>
                                    <span
                                        class="discount-price">${{ number_format($product->price, 2, '.', '') }}</span>
                                @else
                                    <span>${{ number_format($product->price, 2, '.', '') }}</span>
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
            @endif
        @endforeach
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="pagination left" id="pagination">
            <ul class="pagination-list">
                {{ $products->links() }}
            </ul>
        </div>
    </div>
</div>

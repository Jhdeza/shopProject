<div class="row">
    @foreach ($products as $product)
    <div id="productGrid" class="col-lg-3 col-md-6 col-12">
            <div class="single-product">
                <div class="d-flex flex-row align-items-start">
                    <div class="product-image">
                        <img src="{{ request()->is('productGrid/*') ? '/' . $product->image  : $product->image }}" alt="Imagen Producto">
                        @if ($product->is_new || ($product->ofert && $product->ofert->percent))
                            <span class="new-tag">{{ $product->is_new == 1 ? 'New' : '' }}</span>
                            @endif
                            @if ($product->ofert && $product->ofert->percent)
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






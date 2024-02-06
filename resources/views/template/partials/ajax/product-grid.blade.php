
<div class="row">
   
    @foreach ($products as $product)
    <div id="productGrid" class="col-lg-3 col-md-6 col-6">
            <div class="single-product">
                <div class="d-flex flex-row align-items-start">
                    <div class="product-image">
                        <img src="{{ request()->is('productGrid/*') ? '/' . $product->image  : $product->image }}" alt="Imagen Producto">
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

                               - {{ number_format(($product->ofert->value/$product->price)*100, 0, '.', '') }}%
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
                        @if ($product->ofert && $product->ofert->active && $product->ofert->Type == 'PERCENT')
                        <span>${{ number_format($product->price - $product->price * ($product->ofert->value / 100), 2, '.', '') }}</span>
                        <span class="discount-price">${{ number_format($product->price, 2, '.', '') }}</span>
                    @elseif($product->ofert && $product->ofert->value && $product->ofert->active)
                    <span>${{ number_format($product->price - $product->ofert->value , 2, '.', '') }}</span>
                        <span class="discount-price">${{ number_format($product->price, 2, '.', '') }}</span>
                    @else
                        <span>${{ number_format($product->price, 2, '.', '') }}</span>
                    @endif

                        
                    </div>
                    <div class="price">
                        @if ($product->quantity === 0)
                        <span class="price">@lang('main.soldout')</span>
                        @elseif($product->quantity < $product->quantity_alert)
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






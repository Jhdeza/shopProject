@foreach ($result as $product)
    <div class="single-product">
        <div class="d-flex flex-row align-items-start">

            @if ($product->is_new)
                <div class="product-image" style="width: 50px">

                    <img src="assets/images/products/product-4.jpg" alt="#">
                    <span class="new-tag">{{ $product->is_new == 1 ? 'New' : '' }}</span>


                </div>
            @endif
            @if ($product->ofert)
                <div class="product-image" style="width: 50px">
                    <div>
                        <img src="assets/images/products/product-2.jpg" alt="#">
                        <span class="sale-tag">-{{ $product->ofert->percet }}%</span>
                    </div>

                </div>
            @endif

        </div>
        <div class="product-info">
            <span class="category">{{ $product->category->description }}</span>
            <h4 class="title">
                <a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
            </h4>
            <div class="price">

                @if ($product->ofert)
                    <span>${{ $product->price - $product->price * ($product->ofert->percet / 100) }}</span>
                    <span class="discount-price">${{ $product->price }}</span>
                @else
                    <span class="price">${{ $product->price }}</span>
                @endif
            </div>
            <div class="price">
                @if ($product->quantity <= $product->quantity_alert)
                    <span class="price">En Stock: {{ $product->quantity }}</span>
                @endif
            </div>
        </div>
    </div>
@endforeach

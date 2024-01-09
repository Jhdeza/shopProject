<div class="row">
    @foreach ($products as $product)
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Start Single Product -->
            <div class="single-product">
                <div class="row align-items-start">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="d-flex ">

                            @if ($product->is_new || ($product->ofert && $product->ofert->percent))
                                <div class="product-image">

                                    <img src="{{ $product->image }}" alt="Imagen Producto">
                                    <span class="new-tag">{{ $product->is_new == 1 ? 'New' : '' }}</span>

                                    @if ($product->ofert && $product->ofert->percent)
                                        <span
                                            @if ($product->is_new) class="sale-tag " style="margin-left:45px" @endif>-{{ $product->ofert->percent }}%</span>
                                    @endif
                                </div>
                            @endif
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
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Single Product -->
</div>
<div class="row">
    <div class="col-12">
        <!-- Pagination -->
        <div class="pagination left">
            <ul class="pagination-list">
                {{ $products->links() }}
            </ul>
        </div>
        <!--/ End Pagination -->
    </div>
</div>
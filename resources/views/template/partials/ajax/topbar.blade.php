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
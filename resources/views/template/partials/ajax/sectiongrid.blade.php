@if ($quantity > 0)
<section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="product-grids-head">

                        @include('template.partials.ajax.topbar')

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
    </section>
    @else
        @include('template.partials.notfound')
    @endif

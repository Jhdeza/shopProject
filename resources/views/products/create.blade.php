<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form class="form form-generic" enctype="multipart/form-data" method="POST" action="{{ route('product.store') }}">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">@lang('main.insert_Product')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-group">
                        <label class="col-form-label">@lang('main.name')</label>
                        <input type="text"  name="name" class="form-control" value="{{old('name', null)}}">
                    </div>

                    <div class="row selects">
                        <div id="cat-cont" class="form-group col-6">
                            <label class="col-form-label">{{ __('main.category') }}:</label>
                            {!! \App\models\Category::selectHtmlTreeMode() !!}
                        </div>

                        <div id="cat-cont" class="form-group col-6">
                            <label class="col-form-label">{{ __('main.ofert') }}:</label>
                            <select class="form-control select2" name="ofert">
                                <option value="">@lang('main.Select')</option>
                                @foreach ($oferts as $ofert)
                                    <option @selected(old('ofert_id') == $ofert->id) value="{{ $ofert->id }}">{{ $ofert->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label class="col-form-label">@lang('main.price')</label>
                            <input type="text" name="price"  class="form-control validate-types" data-val-type="amount" value="{{old("price",null)}}">
                        </div>

                        <div class="form-group col-4">
                            <label class="col-form-label">@lang('main.quantity')</label>
                            <input type="text" name="quantity"  class="form-control validate-types" data-val-type="quantity" value="{{old('quantity', null)}}">
                        </div>

                        <div class="form-group col-4">
                            <label class="col-form-label">@lang('main.quantity_alert')</label>
                            <input type="text" name="quantity_alert" class="form-control validate-types" data-val-type="quantity_alert" value="{{old('quantity_alert', 0)}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">@lang('main.product_description')</label>
                        <textarea type="text" rows="5"  name="description" class="form-control">{{old('description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">@lang('main.product_details')</label>
                        <textarea name="details" class="summernote">                          
                        </textarea>
                    </div>

                    <div class="form-group">
                        <x-image :params="[
                                'name' => 'galery',
                                'type' => 'multiple',
                                'model' => App\Models\Product::class,
                                'method' => 'getGalery'
                            ]"/>
                    </div>

                    <div class="row">
                        <div class="form-group col-7 pt-4">
                            <input class="form-control" data-on="{{__('main.visible_on_home')}}" data-off="{{__('main.hidden_on_home')}}" @checked(old('act_carusel') == 'on') type="checkbox" name="act_carusel" id="check" data-bootstrap-switch>
                        </div>

                        <div class="form-group col-5 pt-4">
                            <input class=" form-control" data-on="{{__('main.is_new')}}" data-off="{{__('main.is_not_new')}}" @checked(old('is_new') == 'on') type="checkbox" name="is_new" id="check"
                                data-bootstrap-switch>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('main.close')</button>
                <button class="btn btn-outline-success">@lang('main.insert')</button>
            </div>
        </form>
    </div>
</div>



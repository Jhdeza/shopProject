<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form class="form" action="{{ route('product.update', $product) }}">
            @csrf
            @method('PATCH')  
            <div class="modal-header">
                <h4 class="modal-title">@lang('main.edit_product')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-group">
                        <label class="col-form-label">@lang('main.name')</label>
                        <input type="text" name="name" class="form-control" value="{{old('name',$product->name)}}">
                    </div>

                    <div class="row selects">
                        <div id="cat-cont" class="form-group col-6">
                            <label class="col-form-label">{{ __('main.category') }}:</label>
                            {!! \App\models\Category::selectHtmlTreeMode($product) !!}
                            {{-- <select class="form-control select2" name="category_id">
                                <option value="">@lang('main.Select')</option>
                                @foreach ($categories as $category)
                                    <option @selected(old('category_id',$product->category_id) == $category->id) value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select> --}}
                        </div>

                        <div id="cat-cont" class="form-group col-6">
                            <label class="col-form-label">{{ __('main.oferts') }}:</label>
                            <select class="form-control select2" name="ofert_id">
                                <option value="">@lang('main.Select') </option>
                                @foreach ($oferts as $ofert)
                                    <option @selected(old('ofert_id',$product->ofert_id) == $ofert->id) value="{{ $ofert->id }}">{{ $ofert->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label class="col-form-label">@lang('main.price')</label>
                            <input type="text" name="price" required class="form-control validate-types" data-val-type="amount" value="{{$product->price}}">
                        </div>

                        <div class="form-group col-4">
                            <label class="col-form-label">@lang('main.quantity')</label>
                            <input type="text" name="quantity" required class="form-control validate-types" data-val-type="quantity" value="{{$product->quantity}}">
                        </div>

                        <div class="form-group col-4">
                            <label class="col-form-label">@lang('main.quantity_alert')</label>
                            <input type="text" name="quantity_alert" class="form-control validate-types" data-val-type="quantity_alert" value="{{$product->quantity_alert}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">@lang('main.product_description')</label>
                        <textarea type="text" name="description" required class="form-control" >{{old('description',$product->description)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">@lang('main.product_details')</label>
                        <textarea name="details"  class="summernote"> 
                            {{$product->details}}                         
                        </textarea>
                    </div>

                    <div class="form-group">
                        <x-image :params="[
                            'name' => 'galery',
                            'type' => 'multiple',
                            'model' => $product,
                            'method' => 'getGalery',
                            'method' => 'getGalery'
                        ]"/>
                    </div>

                    <div class="row">
                        <div class="form-group col-7 pt-4">
                            <input class=" form-control" data-on="{{__('main.visible_on_home')}}" data-off="{{__('main.hidden_on_home')}}"  {{ old('act_carusel', $product->act_carusel ? 'checked' : '') }} type="checkbox" name="act_carusel" id="check"
                            data-bootstrap-switch>
                        </div>

                        <div class="form-group col-5 pt-4">
                            <input class=" form-control" data-on="{{__('main.is_new')}}" data-off="{{__('main.is_not_new')}}" {{ old('is_new', $product->is_new ? 'checked' : '') }} type="checkbox" name="is_new" id="check"
                            data-bootstrap-switch>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-outline-success">@lang('main.save')</button>
            </div>
        </form>
    </div>
</div>


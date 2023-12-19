{{-- @extends('layouts.middle')


@section('content_header')

@stop

@section('content') --}}
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form class="form" enctype="multipart/form-data" method="post" action="{{ route('product.store') }}">
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
                    <input type="text" name="name" class="form-control" value="{{old('name', null)}}">
                    @error('name')
                        <span style="display: block" class="error invalid-feedback ">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="row selects">
                    <div id="cat-cont" class="form-group col-6">
                        <label class="col-form-label">{{ __('main.category') }}:</label>
                        <select class="form-control select2" name="category_id">
                            <option value="" selected>@lang('main.Select')</option>
                            @foreach ($categories as $category)
                                <option @selected(old('category_id') == $category->id) value="{{ $category->id }}">
                                    {{ $category->description }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span style="display: block" class="error invalid-feedback ">
                                {{ $message }}
                            </span>
                        @enderror
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
                        <input type="text" name="price" class="form-control" value="{{old("price",null)}}">
                        @error('price')
                            <span style="display: block" class="error invalid-feedback ">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-4">
                        <label class="col-form-label">@lang('main.quantity')</label>
                        <input type="text" name="quantity" class="form-control" value="{{old('quantity', null)}}">
                        @error('quantity')
                            <span style="display: block" class="error invalid-feedback ">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-4">
                        <label class="col-form-label">@lang('main.quantity_alert')</label>
                        <input type="text" name="quantity_alert" class="form-control" value="{{old('quantity_alert', 0)}}">
                        @error('quantity_alert')
                            <span style="display: block" class="error invalid-feedback ">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label">@lang('main.product_description')</label>
                    <textarea type="text" name="description" class="form-control">{{old('description')}}</textarea>
                    @error('description')
                        <span style="display: block" class="error invalid-feedback ">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                <x-image :params="[
                        'name' => 'galery',
                        'usePrev' => true,
                        'showBtns' => true,
                        'class' => 'col-12',
                        'itemsClass' => 'col-4',
                        'model' => App\Models\Product::class,
                        'method' => 'getGalery'
                    ]"/>
                </div>

                <div class="row">
                    <div class="form-group col-3">
                        <label class="col-form-label">@lang('main.onsigth')</label>
                        <input class="form-control mt-5" @checked(old('act_carusel') == 'on') type="checkbox" name="act_carusel" id="check" data-bootstrap-switch>
                    </div>

                    <div class="form-group col-2">
                        <label class="col-form-label">@lang('main.onnew')</label>
                        <input class=" form-control mt-5" @checked(old('is_new') == 'on') type="checkbox" name="is_new" id="check"
                            data-bootstrap-switch>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-outline-success">@lang('main.insert')</button>
            </div>
        </form>
    </div>
</div>

{{-- @endsection --}}



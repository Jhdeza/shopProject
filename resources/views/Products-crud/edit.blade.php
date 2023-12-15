@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <form class="form" method="post" action="{{ route('product.update',$product->id) }}">
        @csrf
        @method('PUT')
        <div class="card card-primary mt-5 col-8 p-0">
            <div class="card-header ">
                <h3 class="card-title">@lang('main.edit_product')</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label">@lang('main.name')</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    @error('name')
                        <span style="display: block" class="error invalid-feedback ">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="row  selects">
                    <div id="cat-cont" class="form-group row col-6 ">
                        <label class="col-form-label">{{ __('main.category') }}:</label>
                        <select class="form-control " name="categories">
                            <option value="" selected>@lang('main.Select')</option>
                            @foreach ($categories as $category)
                                <option @selected(old('category_id',$product->category_id) == $category->id) value="{{ $category->id }}">
                                    {{ $category->description }}</option>
                            @endforeach
                        </select>
                        @error('categories')
                    <span style="display: block" class="error invalid-feedback ">
                        {{ $message }}
                    </span>
                @enderror
                    </div>
                    <div id="cat-cont" class="form-group row col-6 ml-2 ">
                        <label class="col-form-label">{{ __('main.oferts') }}:</label>
                        <select class="form-control " name="ofert">
                            <option value="" selected>@lang('main.Select') </option>
                            @foreach ($oferts as $ofert)
                                <option @selected(old('ofert_id',$product->ofert_id) == $ofert->id) value="{{ $ofert->id }}">{{ $ofert->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class=" row ">

                    <div class="form-group col-4 pl-0">
                        <label class="col-form-label">@lang('main.price')</label>
                        <input type="text" name="price" class="form-control" value="{{$product->price}}">
                        @error('price')
                        <span style="display: block" class="error invalid-feedback ">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-4 ">
                        <label class="col-form-label">@lang('main.quantity')</label>
                        <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
                        @error('quantity')
                        <span style="display: block" class="error invalid-feedback ">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-4 ">
                        <label class="col-form-label">@lang('main.quantity_alert')</label>
                        <input type="text" name="quantityAlert" class="form-control" value="{{$product->quantity_alert}}">
                        @error('quantityAlert')
                        <span style="display: block" class="error invalid-feedback ">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label">@lang('main.product_description')</label>
                    <textarea type="text" name="description"  class="form-control" >{{old('description',$product->description)}}</textarea>
                    @error('description')
                    <span style="display: block" class="error invalid-feedback ">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row">

                    <div class="form-group col-3 ">
                        <label class="col-form-label">@lang('main.onsigth')</label>
                        
                        <input class=" form-control mt-5" type="checkbox" name="active" id="check"
                        data-bootstrap-switch>
                    </div>
                    <div class="form-group col-2 ">
                        <label class="col-form-label">@lang('main.onnew')</label>
                        
                        <input class=" form-control mt-5" type="checkbox" name="act" id="check"
                        data-bootstrap-switch>
                    </div>
                </div>
                

            </div>
            <div class="card-footer">
                <Button class="btn btn-outline-success">@lang('main.insert')</Button>
            </div>
        </div>
    </form>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.4.0/dist/css/bootstrap3/bootstrap-switch.min.css" />
        <style>
            .selects span.error{
                position: absolute;
                bottom: -20px;
            }

        </style>
@endsection
@section('js')
    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/js/bootstrap-switch.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch({
                    'state': {{$product->act_carusel}} ,
                    "onText": "Si",
                    "offText": "No",
                });
            })
        })
    </script>
@endsection

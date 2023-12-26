{{-- @extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-6">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h4>{{__('main.edit_category')}}</h4>
                    </div> --}}
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form class="form" enctype="multipart/form-data" method="POST" action="{{ route('category.update', $category->id) }}">
            @csrf
            @method('PATCH')
            <div class="modal-header">
                <h4 class="modal-title">@lang('main.edit_category')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                <div class="form-group">
                    <label class=" col-form-label">{{__('main.name')}}:</label>
                    <input class="form-control " name="name" type="text" placeholder="{{__('main.name')}}" value="{{ $category->name }}">
                </div>                            

                <div class="form-group">
                    <input @checked(old('is_sub', $category->parent_id)) type="checkbox" name="is_sub"   id="is_sub" value="1" />
                    <label class="col-form-label ml-2">@lang('main.is_subcategory')</label>                                
                </div>
                
                <div id="cat-cont" class="form-group">                                
                    <label class="col-form-label">{{__('main.category')}}:</label>
                    <select class="form-control" name="parent_id" >
                        <option value="">@lang('main.Select')</option>
                        @foreach($categories as $categ)
                            <option {{($categ->id == $category->parent_id)?'selected = "selected"':""}} 
                                value="{{$categ->id}}">{{$categ->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row">
                    <div class="form-group">
                        <x-image :params="[
                                'type' => 'simple',
                                'model' => $category,
                                'method' => 'imageUrl'
                            ]"/>
                    </div>
                    {{-- <div class="col-12 pb-4">
                        {{-- @error('file')
                            <span style="display: block" class="error invalid-feedback ">
                                {{ $message }}
                            </span>
                        @enderror --}
                        <div id="cont-img" class="container-big crud-file d-flex align-items-center" data-simple="true" data-id="img">
                            <input type="file" name="file" id="img" class="upload_plugin d-none"/>
                            <a id="trigger" class="parent-img-img mx-auto my-auto d-flex justify-content-center" >                                      
                                <img  data-empty="{{App\Models\Category::urlImageEmpty}}" type="button" src="{{asset($category->image_url)}}" data-holdder-rendered="true" />   
                            </a>
                            <input type="hidden" name="img_flag" id="flag" value="0">  
                            <button id="btn-trigger" class="btn btn-secondary crud-file_change-button  align-self-center roundex" type="button" >
                                <span class="fa fa-camara"></span>{{__('main.change')}}</button> 
                            <button  @class([
                                'btn btn-danger crud-file_remove-button align-self-center roundex',
                                'd-none' => $category->image_url == null
                            ])  type="button" >
                                    <span class="fa fa-trash"></span>
                            </button>    
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('main.close')</button>
                <button class="btn btn-outline-success">@lang('main.update')</button>
            </div>
        </form>
    </div>
</div>



   

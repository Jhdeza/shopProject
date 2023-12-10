@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-6">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h4>{{__('main.create_category')}}</h4>
                    </div>
                    <form class="form" enctype="multipart/form-data" method="post" action="{{ route('category.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class=" col-form-label">{{__('main.name')}}:</label>

                                <input class="form-control" value="{{old('category', null)}}" name="category" type="text" placeholder="{{__('main.name')}}">
                                @error('category')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>                            

                            <div class="form-group row">
                                <input @checked(old('is_sub', false)) type="checkbox" name="is_sub"   id="is_sub" value="1" />
                                <label class="col-form-label ml-2">@lang('main.is_subcategory')</label>                                
                            </div>

                            <div id="cat-cont" class="form-group row d-none">
                                <label class="col-form-label">{{__('main.category')}}:</label>
                                <select class="form-control d-nonde" name="parent_id" >
                                    <option value="" selected>@lang('main.Select')</option>
                                    @foreach($categories as $category)
                                        <option @selected(old('parent_id') == $category->id) value="{{$category->id}}">{{$category->description}}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row pb-4">
                                <div class="col-12">
                                    @error('file')
                                        <span style="display: block" class="error invalid-feedback ">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <div id="cont-img" class="container-big crud-file d-flex align-items-center" data-simple="true" data-id="img">
                                        <input type="file" name="file" id="img" class="upload_plugin d-none" {{-- {!!$obj->attrToString()!!} --}} />
                                        <a id="trigger" class="parent-img-img mx-auto my-auto d-flex justify-content-center" >                                        
                                            <input type="hidden" name="img_flag" id="flag" value="0">
                                            <img  type="button" data-empty="{{App\Models\Category::urlImageEmpty}}" src="{{App\Models\Category::urlImageEmpty}}" data-holdder-rendered="true" />   
                                        </a>
                                        <button id="btn-trigger" class="btn btn-secondary crud-file_change-button  align-self-center roundex" type="button" >
                                            <span class="fa fa-camara"></span>{{__('main.change')}}</button> 
                                        <button class="btn btn-danger crud-file_remove-button d-none  align-self-center roundex" type="button" >
                                                <span class="fa fa-trash"></span>{{-- {{__('main.remove')}} --}}</button>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="button row">
                                <input type="submit" class="btn btn-primary " value="{{__('main.insert')}}" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script defer src="{{asset('images/upload.js')}}" ></script>
    <script>
        $(document).on('change' , '#is_sub', function(){
            toggleCat($(this));
        })

        toggleCat = (el) => {
            if(el.is(':checked'))
                $('#cat-cont').removeClass('d-none');
            else
                $('#cat-cont').addClass('d-none');
        }

        $(document).ready(function(){
            toggleCat($('#is_sub'));

            $('#cont-img').upload({
                simple:true
            }); 

        })
        </script>

@endsection

@section('css')
    <style>
        .crud-file{
            position: relative;
        }

        .crud-file_change-button{
            position: absolute;
            z-index: 200;
            background-color: #212425;
            color: white;
            bottom: -45px;
            right: 45px;
        }

        .crud-file_remove-button{
            position: absolute;
            z-index: 200;
            color: white;
            bottom: -45px;
            right: 0px;
        }

        #cont-img{
            border: 2px dashed #ddd !important;  
            height: 200px;
            width: 200px;

        }

        #cont-img a{
            overflow: hidden;
            position: relative;
        }

        #cont-img img{
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cubre el contenedor manteniendo la relación de aspecto */
            object-position: center; /* Centra la imagen dentro del contenedor */
            transform: scale(1.2);
        }
 </style>

@stop

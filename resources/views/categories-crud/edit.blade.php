@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-6">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h4>{{__('main.edit_category')}}</h4>
                    </div>
                    <form class="form" method="post" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label class=" col-form-label">{{__('main.name')}}:</label>
                                <input class="form-control " name="category" type="text" placeholder="{{__('main.name')}}"
                                    value="{{ $category->description }}">
                                    @error('category')
                                        <span style="display: block" class="error invalid-feedback ">
                                            {{ $message }}
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group row">
                                <input @checked(old('is_sub', $category->parent_id)) type="checkbox" name="is_sub"   id="is_sub" value="1" />
                                <label class="col-form-label ml-2">@lang('main.is_subcategory')</label>                                
                            </div>
                            
                            <div id="cat-cont" class="form-group row">                                
                                <label class="col-form-label">{{__('main.category')}}:</label>
                                <select class="form-control" name="parent_id" >
                                    <option value="" selected>@lang('main.Select')</option>
                                    @foreach($categories as $categ)
                                        <option {{($categ->id == $category->parent_id)?'selected = "selected"':""}} 
                                            value="{{$categ->id}}">{{$categ->description}}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="button row">
                                <input type="submit" class="btn btn-primary " value="{{__('main.update')}}" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

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

        })
        </script>

@endsection

{{-- @section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).on('click', 'input[type=button]', function(e) {
            e.preventDefault();
            let title = "Estas seguro que desea cambiar la informacion"
             let form =$('form');
            swal({
                title: title,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((confirmed) => {
                if (confirmed) {
                    form.trigger("submit");
                }
            });
        })
    </script>
@endsection --}}


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
                    <input id="name" class="form-control " name="name" type="text" placeholder="{{__('main.name')}}" value="{{ $category->name }}">
                </div> 
                <div class="form-group">
                    <label class="col-form-label">{{__('main.slug')}}:</label>
                    <input id="slug" class="form-control" name="slug" readonly type="text" value="{{ $category->slug }}" >
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
                    
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('main.close')</button>
                <button class="btn btn-outline-success">@lang('main.update')</button>
            </div>
        </form>
    </div>
</div>



   

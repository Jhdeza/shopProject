<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form class="form form-generic" enctype="multipart/form-data" method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">@lang('main.create_category')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-group">
                        <label class="col-form-label">{{ __('main.name') }}:</label>
                        <input id="name" class="form-control" name="name" type="text"
                            placeholder="{{ __('main.name') }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">{{ __('main.slug') }}:</label>
                        <input id="slug" class="form-control" name="slug" readonly type="text"
                          >
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="is_sub" id="is_sub" value="1" />
                        <label class="col-form-label ml-2">@lang('main.is_subcategory')</label>
                    </div>

                    <div id="cat-cont" class="form-group d-none">
                        <label class="col-form-label">{{ __('main.category') }}:</label>
                        <select class="form-control d-nonde" name="parent_id">
                            <option value="" selected>@lang('main.Select')</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <x-image :params="[
                            'type' => 'simple',
                            'model' => App\Models\Category::class,
                            'method' => 'image',
                        ]" />
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


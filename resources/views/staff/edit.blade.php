<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form class="form form-generic" enctype="multipart/form-data"  action="{{ route('staff.update', $staff) }}">
            @csrf
            @method('PATCH') 
            <div class="modal-header">
                <h4 class="modal-title">@lang('main.create_membrer')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-group">
                        <label class="col-form-label">{{__('main.name')}}:</label>
                        <input class="form-control" name="name" type="text" value="{{$staff->name}}" placeholder="{{__('main.name')}}">
                    </div>                            
                    <div class="form-group">
                        <label class="col-form-label">{{__('main.position')}}:</label>
                        <input class="form-control" name="position" type="text" value="{{$staff->position}}"placeholder="{{__('main.position')}}">
                    </div>                            
                    <div class="form-group">
                        <label class="col-form-label">{{__('main.facebook')}}:</label>
                        <input class="form-control" name="facebook" type="text" value="{{$staff->facebook}}" placeholder="{{__('main.facebook')}}">
                    </div>                            
                    <div class="form-group">
                        <label class="col-form-label">{{__('main.twitter')}}:</label>
                        <input class="form-control" name="twitter" type="text" value="{{$staff->Twitter}}" placeholder="{{__('main.twitter')}}">
                    </div>                            
                    <div class="form-group">
                        <label class="col-form-label">{{__('main.instagram')}}:</label>
                        <input class="form-control" name="instagram" type="text" value="{{$staff->Instagram}}" placeholder="{{__('main.instagram')}}">
                    </div>                            

                   

                    <div class="form-group row">
                        <div class="form-group">
                            <x-image :params="[
                                    'type' => 'simple',
                                    'model' => $staff,
                                    'method' => 'imageUrl'
                                ]"/>
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

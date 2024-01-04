<div class="form-group pb-4">
    <div class="col-12">
        <div id="cont-{{$object->name}}" class="simple-file file-upload d-flex align-items-center" {!!$object->defineParams()!!}>
            <input type="file" name="{{$object->name}}" id="{{$object->name}}" class="upload_plugin d-none"  />
            <a id="trigger" class="parent-img-{{$object->name}} mx-auto my-auto d-flex justify-content-center" >                                        
                <input type="hidden" name="flag-{{$object->name}}" id="flag" value="0">
                <img  type="button" data-empty="{{$object->model::class::urlImageEmpty}}" src="/{{$object->model->image_url}}" data-holdder-rendered="true" />   
            </a>
            <button id="btn-trigger" class="btn btn-secondary change-btn  align-self-center roundex" type="button" >
                <span class="fa fa-camara"></span>{{__('main.change')}}</button> 
            <button @class([
                'btn btn-danger remove-btn align-self-center roundex',
                'd-none' => $object->model->image == null
            ]) type="button" >
                    <span class="fa fa-trash"></span></button>    
        </div>
    </div>
</div>
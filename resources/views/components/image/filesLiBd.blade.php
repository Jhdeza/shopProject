<li id="{{$file->id}}"
    @class([
        'file', 
        'col-3',
        'mb-4',
        'main' => ($usePrev && $file->is_main)
    ])
    >
    <div class="card card-solid bg-transaparent-gradient">
        <div class="card-header p-0">
            @if(!$disabled)
                <div class="float-right card-tools bg-transparent" style="height:0px;width:auto">
                    @if($usePrev)
                        <button type="button" title="Portada" class="btn btn-tool set_main p-0" >
                            <i class="fas fa-check"></i>
                        </button>
                    @endif
                    <button type="button" title="Remove" class="btn btn-tool remove p-0" >
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <input type="hidden" class=""/>
            @endif
            <div class="item">
                <span>
                    <input type="hidden" value="{{$file->id}}"/>
                    <img class="img img-fluid d-block" src="{{asset($file->url)}}">
                </span>
            </div>
        </div>
    </div>
</li>


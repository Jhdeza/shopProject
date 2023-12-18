
<div class="gen-cont card card-primary cont_upload {{$params['class']}}" {!!$dataAttr!!} >
    @if(!$disabled)
        <div class="cont_btn_upload">
            <button name="Upload" type="button" class="btn btn-success trigger" id="trigger">
                <i class="fas fa-search"></i>
                Search</button>
        </div>
        <input type="file" name="{{$name}}[]" value="" class="d-none" multiple="multiple" id="{{$name}}">
        <input type="hidden" name="mirror_hidden_{{$name}}" value="" id="mirror_hidden_{{$name}}">
        <input type="hidden" name="mirror_hidden_file_{{$name}}" value="" id="mirror_hidden_file_{{$name}}">
        <input type="hidden" name="pre_hidden_{{$name}}" {{--value="{{explode('/',$pre)[count(explode('/',$pre)) -1]}}"--}} id="pre_hidden_{{$name}}">
    @endif
    <div @class(['con_list_imgs row', 'd-none' => $files->isEmpty()]) >
        <ul id="list_files{{$name}}" class="p-0 w-100" style="display: inline-block">
            
                @foreach ($files as $file)
                
                    {{--   $fileName = $file->url;       --}}                      
                    @include('components.image.filesLiBd')
                    {{--  $item = view('components.image.filesLi', [
                        'obj' => $obj,
                        'file' => $file,
                        'fileName' => $fileName
                    ])->render();  --}}
                    {{--  if($extractName($fileName) == $extractName($pre))
                        $items = $item.$items;
                    else
                        $items .= $item;  --}}
                @endforeach
            {{--  @endphp --}}
            {{--  {!!$items!!} --}}
        </ul>
    </div>       
    <div @class(['empty alert text-danger py-0 mb-2', 'd-none' => $files->isNotEmpty()]) role="alert">
        <b >{{__('No images found')}}.</b>
    </div>        
</div>

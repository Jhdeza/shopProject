<?php

namespace App\View\Components\Utils\Image;

class ImageSimple implements ImageInterface{

    public $name = 'file';
    public $containerClass = 'col-12';
    public $model = false, $method = false;
    public $disabled = false;
    public $mimes = [];
    public $file = null;
    public $view = 'components.image.file';

    public function defineParams(){
        $result = '';
        $result = 'data-simple="true" data-id="'.$this->name.'" data-mimes="'.htmlspecialchars(json_encode($this->mimes)).'"'; 
        return $result;
    }

    public function getFiles(){
        
        if($this->method){
            if(!is_object($this->model)){
                $model = $this->model;
                $this->model = new $model();
            }
            $this->file = $this->model->{$this->method}();
        }
       /*  else if($this->path !== null && Storage::disk('localpublic')->exists($this->path))
            return Storage::disk('localpublic')->allFiles($this->path); */
        return [];
    }

    public function getView():String{
        return $this->view;
    }
}
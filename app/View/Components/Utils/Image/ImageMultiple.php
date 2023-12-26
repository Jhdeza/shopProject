<?php

namespace App\View\Components\Utils\Image;

use App\View\Components\Utils\Image\ImageInterface;

class ImageMultiple implements ImageInterface{

    public $name = 'galery';
    public $usePrev = true, $showBtns = true;
    public $containerClass = 'col-12';
    public $itemsClass = 'col-4';
    public $model = false, $method = false;
    public $disabled = false;
    public $mimes = [];
    public $files;
    public $view = 'components.image.image';

    public function defineParams(){
        $result = ' data-id="'.$this->name.'" data-contlist="#list_files'.$this->name.
        '" data-usePrev="'.$this->usePrev.'" data-showBtns="'.$this->showBtns.
        '" data-itemsClass="'.$this->itemsClass.
        '" data-related="'.($this->method===false?false:true).
        '" data-mimes="'.htmlspecialchars(json_encode($this->mimes)).'"';
        return $result;
    }

    public function getFiles(){
        
        if($this->method){
            if(!is_object($this->model)){
                $model = $this->model;
                $this->model = new $model();
            }
            $files = $this->model->{$this->method}();
            if($files !== null)
                $this->files = $files;
        }
        else if($this->path !== null && Storage::disk('localpublic')->exists($this->path))
            return Storage::disk('localpublic')->allFiles($this->path);
        return [];
    }

    public function getView():String{
        return $this->view;
    }
    
}
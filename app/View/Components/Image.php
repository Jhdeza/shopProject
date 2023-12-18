<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
    public $id;
    private $method = false;
    private $model = false;
    public $params;
    public $name;
    public $disabled = false;
    public $files;
    public $panelClass = 'box box-primary';
    public $dataAttr= '';
    public $usePrev= '';
    private $mimes = '';
    /**
     * Create a new component instance.
     */
    public function __construct($params)
    {
        $this->params = $params;
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }

        if(isset($params['method']))
            $this->method = $params['method'];
        if(isset($params['model']))
            $this->model = $params['model'];
        $this->files = $this->getFiles();
        $this->dataAttr = $this->defineParams();
    }

    private function defineParams(){
        $result = ' data-id="'.$this->name.'" data-contlist="#list_files'.$this->name.
        '" data-usePrev="'.$this->params['usePrev'].'" data-showBtns="'.$this->params['showBtns'].
        '" data-itemsClass="'.$this->params['itemsClass'].
        '" data-related="'.($this->method===false?false:true).
        '" data-mimes="'.htmlspecialchars(json_encode($this->mimes)).'"';
        return $result;
    }

    private function getFiles(){
        if($this->method){
            if(!is_object($this->model)){
                $model = $this->model;
                $this->model = new $model();
            }
            $files = $this->model->{$this->method}();
            if($files !== null)
                return $files;
        }
        else if($this->path !== null && Storage::disk('localpublic')->exists($this->path))
            return Storage::disk('localpublic')->allFiles($this->path);
        return [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image.image');
    }
}

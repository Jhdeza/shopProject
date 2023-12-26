<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\View\Components\Utils\Image\ImageInterface;
use App\View\Components\Utils\Image\ImageMultiple;
use App\View\Components\Utils\Image\ImageSimple;

class Image extends Component implements ImageInterface
{
   /*  public $id;
    private $method = false;
    private $model = false;
    public $params;
    public $name;
    public $disabled = false;
    public $files;
    public $panelClass = 'box box-primary';
    public $dataAttr= '';
    public $usePrev= '';
    private $mimes = '';*/
    public $object = null; 
    /**
     * Create a new component instance.
     */
    public function __construct($params)
    {
        switch ($params['type']) {
            case 'simple':
                $this->object = new ImageSimple($params);
                break;
            case 'multiple':
                $this->object = new ImageMultiple($params);
                break;
            
            default:
                throw new \InvalidArgumentException("Invalid image upload variant: {$params['type']}");
                break;
        }
        foreach ($params as $key => $value) {
            if(property_exists($this->object, $key))
                $this->object->$key = $value;
        }       
        $this->object->getFiles();
    }

    public function defineParams(){
        return $this->object->defineParams();
    }

    public function getFiles(){
        return $this->object->getFiles();
    }

    public function getView():String{
        return $this->object->getView();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view($this->object->getView());
    }
}

<?php

namespace App\View\Components\Utils\Image;

interface ImageInterface {
    
    public function defineParams();

    public function getFiles();

    public function getView():String;
}
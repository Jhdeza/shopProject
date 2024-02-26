<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutUs extends Model
{
    use HasFactory;
    
    protected $guarded = [
        "id"
        
    ];
    
    public $timestamps = false;
    const urlImageEmpty = 'path/to/empty/image.jpg';
    protected $table = "about_us";
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function imageUrl(){
        return $this->image_url;
    }

    public function getImageUrlAttribute(){
        if($this->image)
            return $this->image->url;
        return self::urlImageEmpty;
    }



}

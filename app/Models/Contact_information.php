<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_information extends Model
{
    use HasFactory;
    protected $guarded = [
        "id"

    ];
   public $timestamps = false;  
   const urlImageEmpty = 'path/to/empty/image.jpg';
    protected $table = "contacts_information";


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

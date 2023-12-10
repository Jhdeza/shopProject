<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [ "id"];
    public $timestamps = false;  
    protected $table = "categories";
    const urlImageEmpty = 'path/to/empty/image.jpg';

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function subcategories(){
        return $this->hasMany(Category::class);
    }

    public function parent(){
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getImageUrlAttribute(){       
        if($this->image)
            return $this->image->url;
        return self::urlImageEmpty;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\image;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['_token', 'is_new', 'act_carusel'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function ofert(){
        return $this->belongsTo(ofert::class);
    }

    public function galery(): MorphMany
    {
        return $this->morphMany(image::class, 'imageable');
    }

    public function getGalery(){
        return $this->galery()->orderBy('is_main', 'desc')->get();
    }

    public function getMainImage(){
        return $this->galery()->where('is_main', true)->first();
    }

    public function setMainImage($id){
        $main = $this->getMainImage();
        if($main && $id != $main->id){
            $main->update(['is_main' => false]);
            $this->galery()->where('id', $id)->update(['is_main' => true]);
        }
        else{
            $this->galery()->where('id', $id)->update(['is_main' => true]);
        }
    }

    protected $casts = [
        'is_new' => 'boolean',
        'act_carusel' => 'boolean',
    ];


}

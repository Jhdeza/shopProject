<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\image;

class ofert extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function image(): MorphMany
    {
        return $this->morphMany(image::class, 'imageable');
    }





}

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

    public function image(): MorphMany
    {
        return $this->morphMany(image::class, 'imageable');
    }

    protected $casts = [
        'is_new' => 'boolean',        
        'act_carusel' => 'boolean',        
    ];


}

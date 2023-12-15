<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\image;

class Ofert extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function image()
    {
        return $this->morphOne(image::class, 'imageable');
    }

    protected $casts = [
        'date_ini' => 'date',
        'date_end' => 'date',
    ];





}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\image;
use App\Models\Product;

class Ofert extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['_token'];
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

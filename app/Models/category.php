<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded = [ "id"];
   public $timestamps = false;  
    protected $table = "categories";




public function products(){
    return $this->hasMany(Product::class);
}


public function subcategories(){
    return $this->hasMany(Category::class);
}

public function parent(){
    return $this->belongsTo(Category::class);
}





}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brandmodel extends Model
{
    use HasFactory;
    protected $table="models";
    public $timestamps = false;
    public function products(){
        return $this->hasMany(Product::class);
    }



}

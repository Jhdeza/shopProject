<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function values(){
        return $this->belongsToMany(Value::class);}
}
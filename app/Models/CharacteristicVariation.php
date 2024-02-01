<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;



class CharacteristicVariation extends Pivot
{
    use HasFactory;

    public function value(){
        return $this->belongsTo(Value::class);}
}
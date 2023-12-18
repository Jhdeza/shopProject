<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'is_main'];
    public $timestamps = false;

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getPathAttribute(){
        return str_replace('storage/', 'public/' ,$this->url);
    }

    protected $casts = [
        'is_main' => 'boolean'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];
    public $timestamps = false;
    
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    /*public function urlAttribute(){
        return 'storage/'.Storage::url($this->url);
    }*/

    public function getPathAttribute(){
        return str_replace('storage/', 'public/' ,$this->url);
    }

    public function delete(){
        parent::delete();
        Storage::delete($this->path);        
    }
    
  




}

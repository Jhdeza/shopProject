<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_information extends Model
{
    use HasFactory;
    protected $guarded = [
        "id"

        
    ];
   public $timestamps = false;  
    protected $table = "client_contact_informations";

    protected $casts = [
        'reading' => 'boolean',        
    ];



}

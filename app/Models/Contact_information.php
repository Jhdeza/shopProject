<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_information extends Model
{
    use HasFactory;
    protected $guarded = [
        "id"

    ];
   public $timestamps = false;  
    protected $table = "contacts_information";

}

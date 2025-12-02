<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companyblogmodel extends Model
{
    protected $table ="Blogger";
     protected $fillable = [
        'title',        
        'blog', 
        'sender_id', 
        'likes', 
    ];
}

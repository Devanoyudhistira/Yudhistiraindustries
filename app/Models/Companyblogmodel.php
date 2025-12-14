<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Companyblogmodel extends Model
{
    protected $table ="Blogger";
     protected $fillable = [
        'title',        
        'blog', 
        'sender_id', 
    "thumbnail".
        'likes', 
    ];

    public function author():BelongsTo{
        return Companyblogmodel::belongsTo(User::class,"sender_id");
    }
}


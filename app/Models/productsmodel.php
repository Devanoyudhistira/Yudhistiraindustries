<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productsmodel extends Model
{
    protected $table = "products";
     protected $fillable = [
        'price',
        'productname',        
        'seller_id',        
        'description',        
        'rating',        
    ];
}

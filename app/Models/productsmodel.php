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
    public function seller(){
        return $this->belongsTo(User::class,"seller_id");
    }
}

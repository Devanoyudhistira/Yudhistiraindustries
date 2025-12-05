<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function invoice():HasMany{
        return $this->hasMany(invoicemodel::class,"product_id");
    }
}

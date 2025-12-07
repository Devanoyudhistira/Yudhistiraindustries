<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class invoicemodel extends Model
{
    use HasUuids;
    protected $table = "productinvoice";
    public $incrementing = false;
    protected $keytype = "string";    
    protected $fillable = [
        "product_id",
        "buyer_id"
    ];

       public function product()
    {
        return $this->belongsTo(productsmodel::class, "product_id", "id");
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, "buyer_id", "user_id");
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

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
}

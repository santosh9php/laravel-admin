<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductBrand extends pivot
{
    use HasFactory;
     protected $fillable = ['product_id','brand_id',''];
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //,SoftDeletes;
    protected $fillable = ['name', 'slug', 'regular_price','sale_price','quantity','sold_quantity','size','colour','weight','images','short_description','long_description','image_attr','meta_title','meta_keyword','meta_desc','featured','status'];

   
    
    public function productCat()
    {
        return $this->belongsToMany(Category::class,'product_category')->orderBy('name');
    }
    

    
    
}

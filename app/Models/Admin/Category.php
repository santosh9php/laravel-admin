<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id','slug','image','image_attr','description','meta_title','meta_keyword','meta_desc','status'];

   
    public function subCategory()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('name');
    }


    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id')->orderBy('name');

    }

    public function subCategoryProduct()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('name');
    }

    public function products()
    {

         return $this->belongsToMany(Product::class,'product_category','category_id')->where('products.status','active');
    }

     public function noOfproducts()
    {

         return $this->belongsToMany(Product::class,'product_category','category_id');
    }
   
}

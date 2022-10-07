<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','image','image_attr','description','meta_title','meta_keyword','meta_desc','status'];


   
    public function BlogPosts()
    {
        return $this->hasMany(BlogPost::class, 'category_id', 'id')->orderBy('title');
    }
    
}

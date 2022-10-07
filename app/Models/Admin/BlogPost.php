<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','user_id','title', 'slug','content','image','image_attr','meta_title','meta_keyword','meta_desc','status'];

    public function BlogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id')->orderBy('name');
    }

    public function BlogUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','image','image_attr','description','meta_title','meta_keyword','meta_desc','status'];


   
    public function findFaqs()
    {
        return $this->hasMany(Faq::class, 'category_id', 'id')->orderBy('question');
    }
}

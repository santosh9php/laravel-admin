<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

     protected $fillable = ['category_id','question', 'slug','answer','meta_title','meta_keyword','meta_desc','status'];

    public function FaqCategory()
    {
        return $this->belongsTo(FaqCategory::class, 'category_id', 'id')->orderBy('name');;
    }
}

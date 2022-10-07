<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsUser extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','brand','part_name','message','status'];
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
           'admin-login',

           'role-list',
           'role-add',
           'role-edit',
           'role-delete',

           'user-list',
           'user-change-status',
           'user-add',
           'user-edit',
           'user-delete',

           'category-list',
           'category-change-status',
           'category-add',
           'category-edit',
           'category-delete',

           'product-list',
           'product-change-status',
           'product-add',
           'product-edit',
           'product-delete',

           'blog-category-list',
           'blog-category-change-status',
           'blog-category-add',
           'blog-category-edit',
           'blog-category-delete',

           'blog-post-list',
           'blog-post-change-status',
           'blog-post-add',
           'blog-post-edit',
           'blog-post-delete',

           'faq-category-list',
           'faq-category-change-status',
           'faq-category-add',
           'faq-category-edit',
           'faq-category-delete',

           'faq-list',
           'faq-change-status',
           'faq-add',
           'faq-edit',
           'faq-delete',

           'page-list',
           'page-change-status',
           'page-add',
           'page-edit',
           'page-delete',

           'newsletter-delete',

           'contact-us-enquiry-delete',

           
        ];
      
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}

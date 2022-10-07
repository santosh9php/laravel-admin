<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmailVerificationController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ForgotController;
use App\Http\Controllers\Admin\ResetController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\EditProfileController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;
use App\Http\Controllers\Admin\ContactUsUserController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AdminUserController;


// For Frontend Part

use App\Http\Controllers\UserEmailVerificationController;
use App\Http\Controllers\UserResetController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/allclear',function(){
    
   Artisan::call('config:clear');
    
   Artisan::call('route:clear');
    
   Artisan::call('view:clear');
     
   Artisan::call('event:clear');
      
   Artisan::call('optimize:clear');
    
   Artisan::call('cache:clear');

   Artisan::call('optimize');

});

Route::get('/storage',function(){
   Artisan::call('storage:link');

});

Route::get('/', function () {

    return view('welcome');
    
})->name('home');


Route::group(['prefix' => '/','middleware'=>['guest']],function(){
 
   //For both admin and front end

   Route::get('/reset-password/{token}',[UserResetController::class,'index'])->name('password.reset');

   //End of both admin and front end

});

Route::group(['prefix' => '/','middleware'=>[]],function(){

   //For both admin and front end

   Route::get('/email/verify/{id}/{hash}',[UserEmailVerificationController::class, 'verify'])->name('verification.verify');

   // End of email verification

});

Route::group(['prefix' => '/','middleware'=>['auth']],function(){

   //For both admin and front end

   Route::get('/email/verify', [UserEmailVerificationController::class, 'show'])->middleware('auth')->name('verification.notice');

   Route::post('/email/verification-notification', [UserEmailVerificationController::class, 'request'])->middleware(['auth', 'throttle:6,1'])->name('user.verification.request');

   // End of email verification
});




// Routing Part For Admin Side


Route::group(['prefix' => 'admin','middleware' => ['guest']],function(){

    Route::get('/',[AuthController::class,'index'])->name('admin_login');

    Route::post('/',[AuthController::class,'login'])->name('admin_post_login')->middleware('throttle:5,1');

    Route::get('/forgot-password', [ForgotController::class,'index'])->name('admin_forgot_password');

    Route::post('/forgot-password', [ForgotController::class,'forgotPasswordResetLink'])->name('admin_post_forgot_password');

    Route::post('/reset-password',[ResetController::class,'password_update'])->name('admin_password_update');

    Route::get('/register',[RegisterController::class,'index'])->name('admin_register');
    
    Route::post('/register',[RegisterController::class,'register'])->name('admin_post_register');
   
});


Route::group(['prefix' => 'admin','middleware' => ['auth','verified','adminuserrole','check_user_status']],function(){

  
    Route::get('home',[AuthController::class,'dashboard'])->name('admin_dash_dashboard');

    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('admin_dashboard');

    Route::get('/logout',[AuthController::class,'logout'])->name('admin_logout');

    Route::get('/changeup',[ChangePasswordController::class,'index'])->name('admin_changeup');

    Route::post('/changeup',[ChangePasswordController::class,'change_password'])->name('admin_post_changeup');

    Route::get('/viewprofile',[EditProfileController::class,'view_profile'])->name('admin_viewprofile');

    Route::get('/editpf',[EditProfileController::class,'index'])->name('admin_editpf');

    Route::post('/editpf',[EditProfileController::class,'edit_profile'])->name('admin_post_editpf');

//For Role Management

   Route::get('/role',[RoleController::class,'index'])->name('admin_role_show');

   Route::get('/role/add',[RoleController::class,'add_role_form'])->name('admin_role_form_show');

   Route::post('/role',[RoleController::class,'add_role'])->name('admin_post_role_show');

   Route::get('/role/edit/{id}',[RoleController::class,'edit_form'])->name('admin_role_edit');

   Route::put('/role',[RoleController::class,'edit_role_save'])->name('admin_put_role_show');

   Route::delete('/role',[RoleController::class,'destroy'])->name('admin_delete_role_show');


//For Category  Management

   Route::get('/category',[CategoryController::class,'index'])->name('admin_category_show');

   Route::get('/category/add',[CategoryController::class,'add_category_form'])->name('admin_category_form_show');

   Route::post('/category',[CategoryController::class,'add_category'])->name('admin_post_category_show');

   Route::get('/category/edit/{id}',[CategoryController::class,'edit_form'])->name('admin_category_edit');

   Route::put('/category',[CategoryController::class,'edit_category_save'])->name('admin_put_category_show');

   Route::delete('/category',[CategoryController::class,'destroy'])->name('admin_delete_category_show');

  //Route::get('/category',[CategoryController::class,'index'])->name('ckeditor.image-upload');



//For Product Management

   Route::get('/product',[ProductController::class,'index'])->name('admin_product_show');

   Route::get('/product/add',[ProductController::class,'add_product_form'])->name('admin_product_form_show');

   Route::post('/product',[ProductController::class,'add_product'])->name('admin_post_product_show');


   Route::get('/change_dropdown_segment_bodypart',[ProductController::class,'change_dropdown_segment_bodypart'])->name('admin_change_dropdown_segment_bodypart');

   Route::get('/edit_change_dropdown_segment_bodypart',[ProductController::class,'edit_change_dropdown_segment_bodypart'])->name('admin_edit_change_dropdown_segment_bodypart');


   Route::get('/product/edit/{id}',[ProductController::class,'edit_form'])->name('admin_product_edit');

   Route::put('/product',[ProductController::class,'edit_product_save'])->name('admin_put_product_show');

   Route::delete('/product',[ProductController::class,'destroy'])->name('admin_delete_product_show');

   Route::delete('/product/image_delete',[ProductController::class,'image_delete'])->name('admin_product_imagedelete');

   Route::post('/product/ckeditor/image/upload',[ProductController::class,'ckeditor_image_upload'])->name('product_ckeditor_image_upload');

   
//Page Management

   Route::get('/page',[PageController::class,'index'])->name('admin_page_show');

   Route::get('/page/add',[PageController::class,'add_page_form'])->name('admin_page_form_show');

   Route::post('/page',[PageController::class,'add_page'])->name('admin_post_page_show');

   Route::get('/page/edit/{id}',[PageController::class,'edit_form'])->name('admin_page_edit');

   Route::put('/page',[PageController::class,'edit_page_save'])->name('admin_put_page_show');

   Route::delete('/page',[PageController::class,'destroy'])->name('admin_delete_page_show');

   Route::post('/page/ckeditor/image/upload',[PageController::class,'ckeditor_image_upload'])->name('page_ckeditor_image_upload');

//Newsletter Subscriber

   Route::get('/newsletter/subscriber',[NewsletterSubscriberController::class,'index'])->name('admin_news_subs_show');

   Route::delete('/newsletter/subscriber',[NewsletterSubscriberController::class,'destroy'])->name('admin_delete_news_subs_show');

//Contact Us User

   Route::get('/contactus/user',[ContactUsUserController::class,'index'])->name('admin_cont_users_show');

   Route::delete('/contactus/user',[ContactUsUserController::class,'destroy'])->name('admin_delete_cont_users_show');

//Blog Category Managemnt

   Route::get('/blog/category',[BlogCategoryController::class,'index'])->name('admin_blog_category_show');

   Route::post('/blog/category',[BlogCategoryController::class,'add_blog_category'])->name('admin_post_blog_category_show');

   Route::get('/blog/category/edit/{id}',[BlogCategoryController::class,'edit_form'])->name('admin_blog_category_edit');

   Route::put('/blog/category',[BlogCategoryController::class,'edit_blog_category_save'])->name('admin_put_blog_category_show');

   Route::delete('/blog/category',[BlogCategoryController::class,'destroy'])->name('admin_delete_blog_category_show');

//Blog Post Management

   Route::get('/blog/post',[BlogPostController::class,'index'])->name('admin_blog_post_show');

   Route::get('/blog/post/add',[BlogPostController::class,'add_blog_post_form'])->name('admin_blog_post_form_show');

   Route::post('/blog/post',[BlogPostController::class,'add_blog_post'])->name('admin_post_blog_post_show');

   Route::get('/blog/post/edit/{id}',[BlogPostController::class,'edit_form'])->name('admin_blog_post_edit');

   Route::put('/blog/post',[BlogPostController::class,'edit_blog_post_save'])->name('admin_put_blog_post_show');

   Route::delete('/blog/post',[BlogPostController::class,'destroy'])->name('admin_delete_blog_post_show');

   Route::post('/blog/post/ckeditor/image/upload',[BlogPostController::class,'ckeditor_image_upload'])->name('blog_post_ckeditor_image_upload');


   //FAQ Category Managemnt

   Route::get('/faq/category',[FaqCategoryController::class,'index'])->name('admin_faq_category_show');

   Route::post('/faq/category',[FaqCategoryController::class,'add_faq_category'])->name('admin_post_faq_category_show');

   Route::get('/faq/category/edit/{id}',[FaqCategoryController::class,'edit_form'])->name('admin_faq_category_edit');

   Route::put('/faq/category',[FaqCategoryController::class,'edit_faq_category_save'])->name('admin_put_faq_category_show');

   Route::delete('/faq/category',[FaqCategoryController::class,'destroy'])->name('admin_delete_faq_category_show');

//FAQ Management

   Route::get('/faq',[FaqController::class,'index'])->name('admin_faq_show');

   Route::get('/faq/add',[FaqController::class,'add_faq_form'])->name('admin_faq_form_show');

   Route::post('/faq',[FaqController::class,'add_faq'])->name('admin_post_faq_show');

   Route::get('/faq/edit/{id}',[FaqController::class,'edit_form'])->name('admin_faq_edit');

   Route::put('/faq',[FaqController::class,'edit_faq_save'])->name('admin_put_faq_show');

   Route::delete('/faq',[FaqController::class,'destroy'])->name('admin_delete_faq_show');

   Route::post('/faq/ckeditor/image/upload',[FaqController::class,'ckeditor_image_upload'])->name('faq_ckeditor_image_upload');


//Admin User Management

   Route::get('/adminuser',[AdminUserController::class,'index'])->name('admin_user_show');

   Route::get('/adminuser/add',[AdminUserController::class,'add_user_form'])->name('admin_user_form_show');

   Route::post('/adminuser',[AdminUserController::class,'add_user'])->name('admin_post_user_show');

   Route::get('/adminuser/edit/{id}',[AdminUserController::class,'edit_form'])->name('admin_user_edit');

   Route::put('/adminuser',[AdminUserController::class,'edit_user_save'])->name('admin_put_user_show');

   Route::delete('/adminuser',[AdminUserController::class,'destroy'])->name('admin_delete_user_show');

   Route::get('/adminuser/generate/{id}',[AdminUserController::class,'generate'])->name('admin_generate_user_show');

   Route::get('/fetch_state_admin',[DealerUserController::class,'fetch_state'])->name('admin_fetch_state_admin');


});
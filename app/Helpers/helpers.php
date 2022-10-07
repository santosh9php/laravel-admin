<?php
function adminEmailId(){

	$email ='info@skautospares.com';

	return $email;

}

function orderStatus($statusId){

	//'pending','completed','processing','cancelled','shipped','delivered','returned'

	$status='';

	$orderStatus = array(

			1 => 'pending',
			2 => 'completed',
			3 => 'processing',
			4 => 'cancelled',
			5 => 'shipped',
			6 => 'delivered',
			7 => 'returned',
	);

	if($statusId){

		$status = $orderStatus[$statusId];

	}

	return $status;
}


function findUsedNo($couponAttrs,$user_id){
	$used_no = 0;
	if($couponAttrs){
		foreach($couponAttrs as $couponAttr){
				if($couponAttr->id == $user_id){
					$used_no = $couponAttr->pivot->used_no;
					break;
				}
		}
	}
	return $used_no;
}

function findSTPath($imagePath){

	$smallThumbnailPath = '';
	$imageName = basename($imagePath);
  $dirName = dirname($imagePath);
  $smallThumbnailPath = $dirName.'/small/'.$imageName;
  return $smallThumbnailPath;

}

function findMTPath($imagePath){

	$smallThumbnailPath = '';
	$imageName = basename($imagePath);
  $dirName = dirname($imagePath);
  $mediumThumbnailPath = $dirName.'/medium/'.$imageName;
  return $mediumThumbnailPath;

}

function findBrandHPTPath($imagePath){

	$homePageThumbnailPath = '';
	$imageName = basename($imagePath);
  $dirName = dirname($imagePath);
  $homePageThumbnailPath = $dirName.'/homepage/'.$imageName;
  return $homePageThumbnailPath;

}

function findImageIcon($uploadedImage){

	$imageIcon='public/media/image_icon/pdf_icon.jpg';

	$fileExtension = pathinfo($uploadedImage, PATHINFO_EXTENSION);

	if($fileExtension == 'pdf'){

		return $imageIcon;

	} else {

		return $uploadedImage;

	}

}

function createMultipleImages($uploadedImage,$type){

	$uploadedType=['pdf','csv','xls','xlsx','doc','docx'];

	$fileExtension = pathinfo($uploadedImage, PATHINFO_EXTENSION);

	if(!in_array($fileExtension, $uploadedType)){

		$imageName =basename($uploadedImage);

	  $dirName =dirname($uploadedImage);

		$smallThumbnail = $dirName."/small/".$imageName;

	  //medium thumbnail name
	  $mediumThumbnail = $dirName."/medium/".$imageName;

		Image::make(storage_path('app')."/".$uploadedImage)->encode('webp', 90)->save(storage_path('app')."/".$smallThumbnail);

	  Image::make(storage_path('app')."/".$uploadedImage)->encode('webp', 90)->save(storage_path('app')."/".$mediumThumbnail);


	  $smallthumbnailpath = storage_path('app')."/".$smallThumbnail;
	  $mediumthumbnailpath = storage_path('app')."/".$mediumThumbnail;

	  if($type == 'blogpost'){

	  	createThumbnail($smallthumbnailpath, 90, 60);
	    createThumbnail($mediumthumbnailpath, 370, 247);

	  } else if($type == 'user'){

	  	createThumbnail($smallthumbnailpath, 40, 40);
	    createThumbnail($mediumthumbnailpath, 144, 108);

	  } else if($type == 'brand'){

	  	$homePageThumbnail = $dirName."/homepage/".$imageName;

	  	Image::make(storage_path('app')."/".$uploadedImage)->encode('webp', 90)->save(storage_path('app')."/".$homePageThumbnail);

	  	$homepagethumbnailpath = storage_path('app')."/".$homePageThumbnail;

	  	createThumbnail($homepagethumbnailpath, 380, 380);
	  	createThumbnail($smallthumbnailpath, 110, 74);
	    createThumbnail($mediumthumbnailpath, 268, 272);

	  } else{
	  	createThumbnail($smallthumbnailpath, 110, 74);
	    createThumbnail($mediumthumbnailpath, 268, 272);

	  }

	}

}

function createThumbnail($path, $width, $height)
{
  $img = Image::make($path)->resize($width, $height, function ($constraint) {
     // $constraint->aspectRatio();
  });
  $img->save($path);
}

function siteCurrentcy(){
	$currency ='Rs. ';
	return $currency;
}

function newProduct(){
	$no_of_days =7;
	return $no_of_days;
}

function showProductName($productName,$no_of_characters){

	$name='';

	$no_of_words='';

	$lastCharacter ='';

	$name = Str::limit($productName, $no_of_characters,'');

	$no_of_words = Str::wordCount($name);

	$lastCharacter = substr($name, -1);

	if($lastCharacter == ''){
		$name = Str::words($productName, $no_of_words, ' ...');
	} else if($lastCharacter != '' && strlen($name) < $no_of_characters){
		$name = Str::words($productName, $no_of_words, ' ...');
	} else if($lastCharacter != '' &&  $no_of_characters == strlen($name)){
		if(substr($productName,$no_of_characters,1) == ''){
			$name = Str::words($productName, $no_of_words, ' ...');
		} else{
			$name = Str::words($productName, $no_of_words - 1, ' ...');
		}
	} else {
		$name = Str::words($productName, $no_of_words, ' ...');
	}

	return $name;

}

function showProductPrice($regular_price, $sale_price){
	$price = '';
	if($sale_price != $regular_price){
    $price='<span class="price-new">'.siteCurrentcy().number_format($sale_price,2).'</span>';
    $price .='<span class="price-old">'.siteCurrentcy().number_format($regular_price,2).'</span>';
  }else{
    $price='<span class="price">'.siteCurrentcy().number_format($sale_price,2).'</span>';
  }

  if(Auth::check()){
  		if(Auth::user()->role == 'dealer'){
  			  return $price;
  		}
  }
}

function showNewOnProduct($created_at){
	$new = '';
	$creation_time = strtotime($created_at);

  $time_diff = time() - $creation_time;

  if($time_diff <= newProduct()*24*60*60){

    $new = '<span class="label-product label-new">New </span>';
  }

  return $new;
}

function showProductDiscount($regular_price, $sale_price){

	$discount ='';

	if($sale_price != $regular_price){

    $diff_price = $regular_price - $sale_price;

    if($regular_price != 0){

    	$find_percent = ($diff_price * 100) / $regular_price;

    	$discount = '<span class="label-product label-sale">-'.round($find_percent).'%</span>';
  	}
  }

  return $discount;
}

//For All Ctaegory , Brand and Bodypart Show

function createDataInArray($categories){
	$category_arr = array();
	foreach($categories as $category){
      $cat_arr = array();
      $cat_arr['id'] = $category->id;
      $cat_arr['parent_id'] = $category->parent_id;
      $cat_arr['name'] = $category->name;
      $cat_arr['slug'] = $category->slug;
      $cat_arr['image'] = $category->image;
      $cat_arr['image_attr'] = $category->image_attr;
      $cat_arr['description'] = $category->description;
      $cat_arr['meta_title'] = $category->meta_title;
      $cat_arr['meta_keyword'] = $category->meta_keyword;
      $cat_arr['meta_desc'] = $category->meta_desc;
      $cat_arr['status'] = $category->status;
      array_push($category_arr,$cat_arr);
  }

  return $category_arr;

}

function createDataForMenuBrandBodypart($brands,$categoryId){

	$brand_arr = array();
	foreach($brands as $brand){

		if($brand->category_id == $categoryId){
			array_push($brand_arr,$brand);
		}
  }

  return $brand_arr;

}


function findSublevel($category_arr, $categoryId){
  $sublevel_arr = array();
  foreach($category_arr as $category){

      if($category['parent_id'] == $categoryId){
          array_push($sublevel_arr,$category);
      }
  }

  $columns = array_column($sublevel_arr, 'name');
	array_multisort($columns, SORT_ASC, $sublevel_arr);

  return $sublevel_arr;
}


//For Admin Part

function addSlug($model,$slug){

	$check_slug_exist = $model::where('slug',$slug)->where('id','!=',$model->id)->get();
	$slug_count = $check_slug_exist->count();
  if($slug_count){
  	$slug = $slug."-".$model->id;
  }
  $model->slug = $slug;
  $model->save();
}


function edit_redirect_query_string($route){

	$redirect_query_string_after_edit='';
   	if(Route::currentRouteName() == $route){
	      if($redirect_query_string_after_edit ==''){
	         $redirect_query_string_after_edit .='?';
	      }
	      if(app('request')->query('search_by_name')){
	        $redirect_query_string_after_edit .='search_by_name='.app('request')->query('search_by_name')."&";
	      }

	      if($route == 'admin_category_show') {
	      	if(app('request')->query('search_category')){
	        	$redirect_query_string_after_edit .='search_category='.app('request')->query('search_category')."&";
	      	}
	      } else if($route == 'admin_product_show') {
	      	if(app('request')->query('search_by_category')){
	        	$redirect_query_string_after_edit .='search_by_category='.app('request')->query('search_by_category')."&";
	      	}
	      	
	      	if(app('request')->query('order_by')){
	        	$redirect_query_string_after_edit .='order_by='.app('request')->query('order_by')."&";
	      	}

	      } else if($route == 'admin_blog_post_show') {

	      	if(app('request')->query('search_by_title')){
	        	$redirect_query_string_after_edit .='search_by_title='.app('request')->query('search_by_title')."&";
	      	}

	      	if(app('request')->query('search_by_category')){
	        	$redirect_query_string_after_edit .='search_by_category='.app('request')->query('search_by_category')."&";
	      	}

	      } else if($route == 'admin_faq_show') {

	      	if(app('request')->query('search_by_question')){
	        	$redirect_query_string_after_edit .='search_by_question='.app('request')->query('search_by_question')."&";
	      	}

	      	if(app('request')->query('search_by_category')){
	        	$redirect_query_string_after_edit .='search_by_category='.app('request')->query('search_by_category')."&";
	      	}

	      } else if($route == 'admin_user_show') {

	      	if(app('request')->query('search_by_role')){
	        	$redirect_query_string_after_edit .='search_by_role='.app('request')->query('search_by_role')."&";
	      	}

	      	if(app('request')->query('order_by')){
	        	$redirect_query_string_after_edit .='order_by='.app('request')->query('order_by')."&";
	      	}

	      }
	      

	      if(app('request')->query('page')){
	        $redirect_query_string_after_edit .='page='.app('request')->query('page')."&";
	      }
	      session(['redirect_query_string_after_edit' => $redirect_query_string_after_edit]);
   }
}

function get_edit_redirect_query_string(){
	if(session()->has('redirect_query_string_after_edit')){
		return session('redirect_query_string_after_edit');
	} else {
		return "";
	}
}


function getFormEditValue($model,$name){

	$value ='';
	if(old($name))
	{
		$value = old($name);
	} else {
		$value = $model->$name;
	}
	return $value;
}

// For Product Category Field

function getCategoryFormEditValue($product,$id){
	$value ='';
	if(old('brand_id'))
	{
		$value = old('brand_id');
		return $value;
	} else {
		$value =array();
		foreach ($product->productCat as $category) {

		    array_push($value,$category->pivot->category_id);
		}

		return $value;
	}

}

function getCategoryFormAddValue(){
	if(old('category_id') === null or old('category_id') == '')
	{
		return array();
	} else {
		return old('category_id');
	}

}

function left_menu_active($route = array()){

  if(in_array(Route::currentRouteName(),$route) ){

    return 'mm-active';

  }
}

?>

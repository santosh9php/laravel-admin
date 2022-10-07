<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Log;
use Image;


class ProductController extends Controller
{
    public $title='';

    public $edit_title='';


    public $product_add ='';

    public $product_edit ='';

    public $product_find_issue ='';

    public $product_delete = '';

    public $product_delete_issue ='';

    public $product_bulk_status_change ='';

    public $product_bulk_delete ='';

    public $product_add_error ='';

    public $product_edit_error ='';

    public $product_slug_error ='';

    public $product_cat_error ='';

    public $path = array();

    public $destinationPath = '';

    public $product_arr=array();

    public function __construct(){

        $this->title =__("adminPageTitle.product");

        $this->edit_title =__("adminPageTitle.edit_product");


        $this->product_add =__("adminMsg.product_add");

        $this->product_edit =__("adminMsg.product_edit");

        $this->product_find_issue =__("adminMsg.product_find_issue");

        $this->product_delete =__("adminMsg.product_delete");

        $this->product_delete_issue =__("adminMsg.product_delete_issue");

        $this->product_bulk_status_change =__("adminMsg.product_bulk_status_change");

        $this->product_bulk_delete =__("adminMsg.product_bulk_delete");

        $this->product_add_error =__("adminMsg.product_add_error");

        $this->product_edit_error =__("adminMsg.product_edit_error");

        $this->product_slug_error =__("adminMsg.product_slug_error");

        $this->product_cat_error =__("adminMsg.product_cat_error");

        $this->destinationPath = 'public/media/product';

        $this->middleware('permission:product-list|product-add|product-edit|product-delete', ['only' => ['index']]);
        $this->middleware('permission:product-add', ['only' => ['add_product_form','add_product']]);
        $this->middleware('permission:product-edit', ['only' => ['edit_form','edit_product_save']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $title=$this->title;

        $search_by_category=$request->query('search_by_category');
      
        $order_by =$request->query('order_by');

        $search_by_name=$request->query('search_by_name');

        $product_status_ids=$request->query('product_status_ids');

        $product_bulk_delete_ids=$request->query('product_bulk_delete_ids');

        $no_of_records=100;

        $categories = Category::where('parent_id', null)->orderby('id', 'asc')->get();


        if($search_by_category  !== null) {


            $products = Product::whereHas('productCat', function (Builder $query) use($search_by_category) {
                $query->where('category_id', $search_by_category);
            })->orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());


        } else if($order_by  !== null) {

            if($order_by == 'product_name_asc'){

                $products = Product::orderBy('name','asc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'product_name_desc'){

                $products = Product::orderBy('name','desc')->paginate($no_of_records)->appends(request()->query());

            }else if($order_by == 'sale_price_asc'){

                $products = Product::orderBy('sale_price','asc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'sale_price_desc'){

                $products = Product::orderBy('sale_price','desc')->paginate($no_of_records)->appends(request()->query());

            }else if($order_by == 'created_at_asc'){

                $products = Product::orderBy('created_at','asc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'created_at_desc'){

                $products = Product::orderBy('created_at','desc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'featured'){

                $products = Product::orderBy('featured','asc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'status_active') {

                 $products = Product::orderBy('status','asc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'status_inactive') {

                 $products = Product::orderBy('status','desc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'views_asc') {

                 $products = Product::orderBy('views','asc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'views_desc') {

                 $products = Product::orderBy('views','desc')->paginate($no_of_records)->appends(request()->query());

            }

        } else if ($search_by_name !== null){

            $products = Product::where('name', 'LIKE', '%'.$search_by_name.'%')->orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

        }  else if ($product_status_ids !== null){

            $product_id_arr = explode(",",$product_status_ids);

            if($request->query('status') == 'active'){
                Product::whereIn('id', $product_id_arr) ->update(['status' => 'active']);
            } else{
                Product::whereIn('id', $product_id_arr) ->update(['status' => 'inactive']);
            }

            $products = Product::orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

            $request->session()->flash('success', $this->product_bulk_status_change);

            return redirect()->back();

        } else if ($product_bulk_delete_ids !== null){

            $product_id_arr = explode(",",$product_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){


                foreach($product_id_arr as $product_id){

                    $product = Product::find($product_id);

                    //For deleting uploaded files
                    $images = json_decode($product->images);

                    foreach($images as $image){
                        if(Storage::exists($image)){
                            Storage::delete($image);
                        }
                    }

                }

                Product::whereIn('id', $product_id_arr) ->delete();

                $request->session()->flash('success', $this->product_bulk_delete);

            } 

           $products = Product::orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

            return redirect()->back();

        } else {

            $products = Product::orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

        }
        
        return view('admin.product')->with(compact('title','products','categories'));
    }

    public function add_product_form(Request $request)
    {   
        $title = $this->title;
        $category_id = old('category_id');
        
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
       

        return view('admin.product_add')->with(compact('title','categories'));
    }

    public function add_product(Request $request)
    {

        $validatedData = $request->validate([
                'category_id'      => 'required',
                'name'      => 'required',
                'status'      => 'required',
            ]);

       

        if(!is_array($request->category_id)){
            $request->session()->flash('error', $this->product_cat_error);
            return redirect()->back()->withInput();
        }

        $slug =Str::of($request->name)->slug('-');

        if($request->hasFile('images')){
            $image_count = 1;
            foreach($request->file('images') as $image)
            {
                //$name=$image->getClientOriginalName();
               // $image->move(public_path().'/images/', $name);  
               // $data[] = $name; 
                if ($image->isValid()) {
                   // $this->path[] = $image->storeAs($this->destinationPath,time()."-".$image_count.'.'.$image->extension());

                    $productImagePath='';

                    if($image->extension() == 'jpg' or $image->extension() == 'jpeg' or $image->extension() == 'png'){

                        
                        $productImagePath =$this->destinationPath."/".$slug."-".time()."-".$image_count.'.'.'webp';

                        $this->path[] = $productImagePath;

                        Image::make($image)->encode('webp', 90)->save(storage_path('app')."/".end($this->path));

                    } else {
                        
                        $productImagePath = $image->storeAs($this->destinationPath,$slug."-".time()."-".$image_count.'.'.$image->extension());

                         $this->path[] = $productImagePath;
                    }


                    createMultipleImages($productImagePath,'product');
                } 

                $image_count++; 

            }

        }

        try{

            if($request->regular_price == ''){
                $request->regular_price = 0.00;
            }
            if($request->sale_price == ''){
               $request->sale_price = 0.00;
            }
            if(($request->regular_price == 0.00 && $request->sale_price != 0.00) or ($request->regular_price < $request->sale_price)){
                $request->regular_price = $request->sale_price;
            }
            if($request->quantity == ''){
               $request->quantity = 0;
            }
            $category_arr=[];
            if(is_array($request->category_id)){
                for($i=0; $i < count($request->category_id); $i++){
                    if($request->category_id[$i] != '' && $request->category_id[$i] != null ){
                        array_push($category_arr,$request->category_id[$i]);
                    }
                }
            }

            $productObj = Product::create([
                    'name' => $request->name,
                    'regular_price' => round($request->regular_price),
                    'sale_price' => round($request->sale_price),
                    'size' => $request->size,

                    /*
                    'quantity' => $request->quantity,
                    'colour' => $request->colour,
                    'weight' => $request->weight,
                    */

                    'images' => json_encode($this->path),
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                    'image_attr' => $request->image_attr,
                    'meta_title' =>$request->meta_title,
                    'meta_keyword' =>$request->meta_keyword,
                    'meta_desc' =>$request->meta_desc,
                    'featured' => $request->featured,
                    'status' =>$request->status
                ]);

            
            addSlug($productObj,$slug);

            $productNewObj = Product::find($productObj->id); 
            $productNewObj->productCat()->sync($category_arr);

            return redirect()->back()->with('success', $this->product_add);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->product_add_error);
            return redirect()->back()->withInput();

            
        }
        
            
    } 

    

    public function edit_form(Request $request){

        $selected_categories = array();

        $title = $this->edit_title;

        $product_id = $request->route('id');

        $product = Product::find($product_id);

        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();

        $selected_categories = Category::whereIn('id', getCategoryFormEditValue($product,$product_id))->orderby('name', 'asc')->get();

        return view('admin.product_edit')->with(compact('title','categories','product','selected_categories'));

    }


    public function edit_product_save(Request $request){

        $product_id=$request->product_id;

        $product = Product::find($product_id);

        $validatedData = $request->validate([
                'category_id' => 'required',
                'name'      => 'required',
                'status'      => 'required',
            ]);

        

        if(!is_array($request->category_id)){
            $request->session()->flash('error', $this->product_cat_error);
            return redirect()->back()->withInput();
        }



        $this->path=json_decode($product->images,true); 
        if($request->hasFile('images')){
            $image_count = 1;
            foreach($request->file('images') as $image)
            {
                //$name=$image->getClientOriginalName();
               // $image->move(public_path().'/images/', $name);  
               // $data[] = $name;
                if ($image->isValid()) {
                    //$this->path[] = $image->storeAs($this->destinationPath,time()."-".$image_count.'.'.$image->extension());

                    $productImagePath ='';

                    if($image->extension() == 'jpg' or $image->extension() == 'jpeg' or $image->extension() == 'png'){

                        $productImagePath =$this->destinationPath."/".$product->slug."-".time()."-".$image_count.'.'.'webp';

                        $this->path[] = $productImagePath;

                        Image::make($image)->encode('webp', 90)->save(storage_path('app')."/".end($this->path));

                    } else {
                        
                        $productImagePath = $image->storeAs($this->destinationPath,$product->slug."-".time()."-".$image_count.'.'.$image->extension());

                         $this->path[] = $productImagePath;
                    }

                    createMultipleImages($productImagePath,'product');
                } 

                $image_count++; 

            }

        }

        try{

            if($request->regular_price == ''){
                $request->regular_price = 0.00;
            }
            if($request->sale_price == ''){
               $request->sale_price = 0.00;
            }
            if(($request->regular_price == 0.00 && $request->sale_price != 0.00) or ($request->regular_price < $request->sale_price)){
                $request->regular_price = $request->sale_price;
            }
            
            if($request->quantity == ''){
               $request->quantity = 0;
            }
            $category_arr=[];
            if(is_array($request->category_id)){
                for($i=0; $i < count($request->category_id); $i++){
                    if($request->category_id[$i] != '' && $request->category_id[$i] != null ){
                        array_push($category_arr,$request->category_id[$i]);
                    }
                }
            }
            $product->name = $request->name;
            $product->regular_price = round($request->regular_price);
            $product->sale_price = round($request->sale_price);
            $product->size = $request->size;

            /*
            $product->quantity = $request->quantity;
            $product->colour = $request->colour;
            $product->weight = $request->weight;
            */

            $product->images = json_encode($this->path);
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->image_attr = $request->image_attr;
            $product->meta_title =$request->meta_title;
            $product->meta_keyword =$request->meta_keyword;
            $product->meta_desc =$request->meta_desc;
            $product->featured =$request->featured;
            $product->status =$request->status;
            
            $product->save();

            $product->productCat()->sync($category_arr);

            return redirect(route('admin_product_show').get_edit_redirect_query_string())->with('success', $this->product_edit);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->product_edit_error);
            return redirect()->back()->withInput();
        }

    }

    public function image_delete(Request $request){

        $product_id= $request->id;
        $req_image = $request->image;

        if($product_id){
            $product = Product::find($product_id);
            $this->path=json_decode($product->images,true); 
            try
            {
                foreach($this->path as $key => $image)
                {
                    if($req_image == $image){
                        if(Storage::exists($image)){
                            unset($this->path[$key]);

                            $imageName =basename($image);
                            $dirName =dirname($image);
                            Storage::delete($image);
                            Storage::delete($dirName.'/small/'.$imageName);
                            Storage::delete($dirName.'/medium/'.$imageName);



                            $product->images=$this->path;
                            $product->save();
                        }
                    }
                }

                return response()->json([
                    'message' => 'Image deleted successfully!',
                ]);

            }catch(\Exception $e) {

                return response()->json([
                    'message' => 'Some issue occured while deleting an image.',
                    'e'=>$e->getMessage(),
                ]);
            }   
        } else {
            return response()->json([
                'message' => 'Some issue occured while deleting an image.',
            ]);
        }



    }

    public function ckeditor_image_upload(Request $request){

        if($request->hasFile('upload')) {

            if ($request->file('upload')->isValid()) {
                $fileName = time().'.'.$request->file('upload')->extension();
                $path = $request->file('upload')->storeAs($this->destinationPath,$fileName);
            }

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset(Storage::url($path));
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;

            
        }
    }


    public function destroy(Request $request)
    {
        $product_id = $request->product_id;
        if(is_numeric($product_id)){
            $product = Product::where('id',$product_id)->get();
            
            if(count($product)){
                
                //For deleting uploaded files
                $images = json_decode($product[0]['images']);
                foreach($images as $image){
                   
                    if(Storage::exists($image)){

                        $imageName =basename($image);
                        $dirName =dirname($image);
                        Storage::delete($image);
                        Storage::delete($dirName.'/small/'.$imageName);
                        Storage::delete($dirName.'/medium/'.$imageName);
                    }
                }
                Product::find($product_id)->delete();
                return redirect()->back()->with('success', $this->product_delete);

            } else {
                return redirect()->back()->with('error', $this->product_delete_issue);
            }


        } else {
            return redirect(route('admin_product_show'))->with('error', $this->product_delete_issue);

        }
    }


    public static function getCategoryParents($categoryArr){

        $parents = array();
        $categories =Category::whereIn('id',$categoryArr)->get();
        foreach($categories as $category){
            if(isset($category->parent)){

                $parent = $category->parent;

                while(!is_null($parent)) {
                    array_push($parents,$parent->id);
                    //$parents->push($parent->id);
                    $parent = $parent->parent;
                }
            }
        }
        return $parents;

    }

    

   

    

   


   

   



    
    
  


    

    

   

}

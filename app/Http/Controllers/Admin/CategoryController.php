<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Log;
use Image;
class CategoryController extends Controller
{
    public $title='';

    public $edit_title='';

    public $parent_id_error ='';

    public $category_add ='';

    public $category_edit ='';

    public $category_find_issue ='';

    public $category_delete = '';

    public $category_have_subcat ='';

    public $category_delete_issue ='';

    public $category_bulk_status_change ='';

    public $category_bulk_delete ='';

    public $category_add_error ='';

    public $category_edit_error ='';

    public $category_slug_error ='';

    public $path = '';

    public $destinationPath = '';

    public $category_arr=array();

    public $no_of_record='';

    public function __construct(){

        $this->title =__("adminPageTitle.category");

        $this->edit_title =__("adminPageTitle.edit_category");

        $this->parent_id_error =__("adminMsg.parent_id_error");

        $this->category_add =__("adminMsg.category_add");

        $this->category_edit =__("adminMsg.category_edit");

        $this->category_find_issue =__("adminMsg.category_find_issue");

        $this->category_delete =__("adminMsg.category_delete");

        $this->category_have_subcat =__("adminMsg.category_have_subcat");

        $this->category_delete_issue =__("adminMsg.category_delete_issue");

        $this->category_bulk_status_change =__("adminMsg.category_bulk_status_change");

        $this->category_bulk_delete =__("adminMsg.category_bulk_delete");

        $this->category_add_error =__("adminMsg.category_add_error");

        $this->category_edit_error =__("adminMsg.category_edit_error");

        $this->category_slug_error =__("adminMsg.category_slug_error");

        $this->no_of_record = 20;

        $this->destinationPath = 'public/media/category';

        $this->middleware('permission:category-list|category-add|category-edit|category-delete', ['only' => ['index']]);
        $this->middleware('permission:category-add', ['only' => ['add_category_form','add_category']]);
        $this->middleware('permission:category-edit', ['only' => ['edit_form','edit_category_save']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        
    }

    public function showSubCategory($subcategories){
        foreach($subcategories as $subcategory){
            array_push($this->category_arr,$subcategory->id);
            if(count($subcategory->subcategory)){
                $this->showSubCategory($subcategory->subcategory);
            }
        }

    }

    public function showParent($parentCat){
        array_push($this->category_arr,$parentCat->id);
        if($parentCat->parent){
            $this->showParent($parentCat->parent);
        }
    }

    public function index(Request $request)
    {
        $title=$this->title;

        $search_category_id=$request->query('search_category');

        $search_by_name=$request->query('search_by_name');

        $category_status_ids=$request->query('category_status_ids');

        $category_bulk_delete_ids=$request->query('category_bulk_delete_ids');

        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();

        /*
        foreach($categories as $category){
           array_push($this->category_arr,$category->id);
           if(count($category->subcategory)){
                $this->showSubCategory($category->subcategory);

           }
        }
        */

        if($search_category_id  !== null) {

            $categories_list = Category::where('id',$search_category_id)->orderby('name', 'asc')->paginate($this->no_of_record)->appends(request()->query());

        } else if ($search_by_name !== null){

            $categories_list = Category::where('name', 'LIKE', '%'.$search_by_name.'%')->orderby('name', 'asc')->paginate($this->no_of_record)->appends(request()->query());

        } else if ($category_status_ids !== null){

            $cat_id_arr = explode(",",$category_status_ids);
            if($request->query('status') == 'active'){

                $categories = Category::whereIn('id', $cat_id_arr)->get();

                foreach($categories as $category){
                   array_push($this->category_arr,$category->id);
                   if($category->parent){
                        $this->showParent($category->parent);

                   }
                }

                Category::whereIn('id', $this->category_arr) ->update(['status' => 'active']);


            } else{

                $categories = Category::whereIn('id', $cat_id_arr)->get();

                foreach($categories as $category){
                   array_push($this->category_arr,$category->id);
                   if(count($category->subcategory)){
                        $this->showSubCategory($category->subcategory);

                   }
                }
                Category::whereIn('id', $this->category_arr) ->update(['status' => 'inactive']);
               
            }

            $categories_list = Category::where('parent_id', null)->orderby('name', 'asc')->paginate($this->no_of_record);

            $request->session()->flash('success', $this->category_bulk_status_change);

            return redirect()->back();

        } else if ($category_bulk_delete_ids !== null){

            $cat_id_arr = explode(",",$category_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){

                Category::whereIn('id', $cat_id_arr) ->delete();

                $request->session()->flash('success', $this->category_bulk_delete);

            } 

            $categories_list = Category::where('parent_id', null)->orderby('name', 'asc')->paginate($this->no_of_record);
           return redirect()->back();

        }else{

            //$categories_list = Category::where('parent_id', null)->orderby('name', 'asc')->paginate(2);
           // Post::find(1)->comments;
           // $categories_list = Category::whereIn('id', $this->category_arr)->orderby('name', 'asc')->paginate(10);
           // $categories_list = Category::whereIn('id', $this->category_arr)->paginate(10);

            $categories_list = Category::where('parent_id', null)->orderby('name', 'asc')->paginate($this->no_of_record)->appends(request()->query());;

        }
        
        
        return view('admin.category')->with(compact('title','categories','categories_list'));
    }

    public function add_category_form(Request $request)
    {   
        $title=$this->title;

        $categories = Category::where('parent_id', null)->orderby('id', 'asc')->get();

        return view('admin.category_add')->with(compact('title','categories'));
    }

    public function add_category(Request $request)
    {

        $validatedData = $request->validate([
                'name'      => 'required',
                'parent_id' => 'nullable|numeric',
                //'status'      => 'required',
            ]);

        $slug =Str::of($request->name)->slug('-');

        if($request->hasFile('image')){
            if ($request->file('image')->isValid()) {
               // $this->path = $request->file('image')->storeAs($this->destinationPath,time().'.'.$request->file('image')->extension());

                if($request->file('image')->extension() == 'jpg' or $request->file('image')->extension() == 'jpeg' or $request->file('image')->extension() == 'png'){

                    $this->path=$this->destinationPath."/".$slug."-".time().'.'.'webp';

                    Image::make($request->file('image'))->encode('webp', 90)->save(storage_path('app')."/".$this->path);

                } else {
                    
                    $this->path = $request->file('image')->storeAs($this->destinationPath,$slug."-".time().'.'.$request->file('image')->extension());
                }

                createMultipleImages($this->path,'category');

            }
        }

        try{
            $categoryObj = Category::create([
                    'name' => $request->name,
                    'parent_id' =>$request->parent_id,
                    'image' =>$this->path,
                    'image_attr' =>$request->image_attr,
                    'description' =>$request->description,
                    'meta_title' =>$request->meta_title,
                    'meta_keyword' =>$request->meta_keyword,
                    'meta_desc' =>$request->meta_desc,
                    //'status' =>$request->status
                ]);

            
            addSlug($categoryObj,$slug);

            return redirect()->back()->with('success', $this->category_add);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->category_add_error);
            return redirect()->back()->withInput();
        }
        
            
    }   

    public function edit_form(Request $request){

        $title = $this->edit_title;

        $cat_id = $request->route('id');

        $category = Category::find($cat_id);

        $categories = Category::where('parent_id', null)->orderby('id', 'asc')->get();

        return view('admin.category_edit')->with(compact('title','category','categories'));

    }

    public function edit_category_save(Request $request){

        $category_id=$request->category_id;

        $category = Category::find($category_id);
        if($category){

            $request->validate([
                //'name'      => 'required|unique:categories'.$category->id,
                //'name'      => ['required',Rule::unique('categories')->ignore($category->id)],

                'name'      => 'required',
                'parent_id' => 'nullable|numeric',
            ]);


            if($category->id == $request->parent_id){

                return redirect()->back()->with('error', $this->parent_id_error);
            } else {

                if($request->parent_id != null){

                    $category_parent = Category::find($request->parent_id);
                    if($category->id == $category_parent->parent_id){
                        
                        return redirect()->back()->with('error', $this->parent_id_error);                  
                    }
                }
            }

             if($request->hasFile('image')){
                if ($request->file('image')->isValid()) {
                    //$this->path = $request->file('image')->storeAs($this->destinationPath,time().'.'.$request->file('image')->extension());

                    if($request->file('image')->extension() == 'jpg' or $request->file('image')->extension() == 'jpeg' or $request->file('image')->extension() == 'png'){

                        $this->path=$this->destinationPath."/".$category->slug."-".time().'.'.'webp';

                        Image::make($request->file('image'))->encode('webp', 90)->save(storage_path('app')."/".$this->path);

                    } else {
                        
                         $this->path = $request->file('image')->storeAs($this->destinationPath,$category->slug."-".time().'.'.$request->file('image')->extension());
                    }
                    createMultipleImages($this->path,'category');

                    //For deleting previous uploaded files
                    if(Storage::exists($category->image)){
                        $imageName =basename($category->image);
                        $dirName =dirname($category->image);
                        Storage::delete($category->image);
                        Storage::delete($dirName.'/small/'.$imageName);
                        Storage::delete($dirName.'/medium/'.$imageName);
                    }
                    $category->image = $this->path;


                }
            }

            $category->name = $request->name;
            $category->parent_id =$request->parent_id;
            $category->image_attr = $request->image_attr;
            $category->description = $request->description;
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_desc = $request->meta_desc;

            try{
                $category->save();
                return redirect(route('admin_category_show').get_edit_redirect_query_string())->with('success', $this->category_edit);

            } catch(\Exception $e) {
                return redirect()->back()->with('success', $this->category_edit_error);
            }
        

        } else {

            return redirect()->back()->with('error', $this->category_find_issue);

        }

    }

    public function destroy(Request $request)
    {
        $category_id = $request->category_id;
        if(is_numeric($category_id)){
            if(!count(Category::find($category_id)->subcategory)){

                $category = Category::find($category_id);
                //For deleting uploaded files
                if($category->image != ''){
                    if(Storage::exists($category->image)){

                        $imageName =basename($category->image);
                        $dirName =dirname($category->image);
                        Storage::delete($category->image);
                        Storage::delete($dirName.'/small/'.$imageName);
                        Storage::delete($dirName.'/medium/'.$imageName);
                        
                    }
                }

                Category::find($category_id)->delete();
                return redirect()->back()->with('success', $this->category_delete);
            } else {
                return redirect()->back()->with('error', $this->category_have_subcat);
            }


        } else {
            return redirect(route('admin_category_show'))->with('error', $this->category_delete_issue);

        }
    }



    public static function getAllPrents($id){

        $parents = array();

        if($id)
        {
            $category =Category::find($id);
            if($category->parent){

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

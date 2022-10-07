<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\BlogCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Log;
use Image;

class BlogCategoryController extends Controller
{
    public $title='';

    public $edit_title='';

    public $blog_category_add ='';

    public $blog_category_edit ='';

    public $blog_category_find_issue ='';

    public $blog_category_delete = '';

    public $blog_category_delete_issue ='';

    public $blog_category_bulk_status_change ='';

    public $blog_category_bulk_delete ='';

    public $blog_category_add_error ='';

    public $blog_category_edit_error ='';

    public $blog_category_slug_error ='';

    public $path = '';

    public $destinationPath = '';

    public $blog_category_arr=array();

    public function __construct(){

        $this->title =__("adminPageTitle.blog_category");

        $this->edit_title =__("adminPageTitle.edit_blog_category");

        $this->blog_category_add =__("adminMsg.blog_category_add");

        $this->blog_category_edit =__("adminMsg.blog_category_edit");

        $this->blog_category_find_issue =__("adminMsg.blog_category_find_issue");

        $this->blog_category_delete =__("adminMsg.blog_category_delete");

        $this->blog_category_delete_issue =__("adminMsg.blog_category_delete_issue");

        $this->blog_category_bulk_status_change =__("adminMsg.blog_category_bulk_status_change");

        $this->blog_category_bulk_delete =__("adminMsg.blog_category_bulk_delete");

        $this->blog_category_add_error =__("adminMsg.blog_category_add_error");

        $this->blog_category_edit_error =__("adminMsg.blog_category_edit_error");

        $this->blog_category_slug_error =__("adminMsg.blog_category_slug_error");

        $this->destinationPath = 'public/media/blog_category';

        $this->middleware('permission:blog-category-list|blog-category-add|blog-category-edit|blog-category-delete', ['only' => ['index']]);
        $this->middleware('permission:blog-category-add', ['only' => ['add_blog_category']]);
        $this->middleware('permission:blog-category-edit', ['only' => ['edit_form','edit_blog_category_save']]);
        $this->middleware('permission:blog-category-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $title=$this->title;

        $search_blog_category_id=$request->query('search_blog_category');

        $search_by_name=$request->query('search_by_name');

        $blog_category_status_ids=$request->query('blog_category_status_ids');

        $blog_category_bulk_delete_ids=$request->query('blog_category_bulk_delete_ids');

        $no_of_records =15;

        if($search_blog_category_id  !== null) {

            $categories = BlogCategory::where('id',$search_blog_category_id)->orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

        } else if ($search_by_name !== null){

            $categories = BlogCategory::where('name', 'LIKE', '%'.$search_by_name.'%')->orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

        } else if ($blog_category_status_ids !== null){

            $cat_id_arr = explode(",",$blog_category_status_ids);
            if($request->query('status') == 'active'){
                BlogCategory::whereIn('id', $cat_id_arr) ->update(['status' => 'active']);
            } else{
                BlogCategory::whereIn('id', $cat_id_arr) ->update(['status' => 'inactive']);
            }

            $categories = BlogCategory::orderby('name', 'asc')->paginate($no_of_records);

            $request->session()->flash('success', $this->blog_category_bulk_status_change);

            return redirect()->back();

        } else if ($blog_category_bulk_delete_ids !== null){

            $cat_id_arr = explode(",",$blog_category_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){

                BlogCategory::whereIn('id', $cat_id_arr) ->delete();

                $request->session()->flash('success', $this->blog_category_bulk_delete);

            } 

            $categories = BlogCategory::orderby('name', 'asc')->paginate($no_of_records);
           return redirect()->back();

        }else{


            $categories = BlogCategory::orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());;

        }
        
        
        return view('admin.blog_category')->with(compact('title','categories'));
    }

    public function add_blog_category(Request $request)
    {

        $validatedData = $request->validate([
                'name'      => 'required',
                'status'      => 'required',
            ]);
        
        $slug =Str::of($request->name)->slug('-');

        if($request->hasFile('image')){
            if ($request->file('image')->isValid()) {
                //$this->path = $request->file('image')->storeAs($this->destinationPath,time().'.'.$request->file('image')->extension());

                if($request->file('image')->extension() == 'jpg' or $request->file('image')->extension() == 'jpeg' or $request->file('image')->extension() == 'png'){

                    $this->path=$this->destinationPath."/".$slug."-".time().'.'.'webp';

                    Image::make($request->file('image'))->encode('webp', 90)->save(storage_path('app')."/".$this->path);

                } else {
                    
                    $this->path = $request->file('image')->storeAs($this->destinationPath,$slug."-".time().'.'.$request->file('image')->extension());
                }
                createMultipleImages($this->path,'blogCategory');
            }
        }

        try{
            $BlogCategoryObj = BlogCategory::create([
                    'name' => $request->name,
                    'image' =>$this->path,
                    'image_attr' =>$request->image_attr,
                    'description' =>$request->description,
                    'meta_title' =>$request->meta_title,
                    'meta_keyword' =>$request->meta_keyword,
                    'meta_desc' =>$request->meta_desc,
                    'status' =>$request->status
                ]);

            
            addSlug($BlogCategoryObj,$slug);

            $request->session()->flash('open_add_form', 'show');
            return redirect()->back()->with('success', $this->blog_category_add);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->blog_category_add_error);
            $request->session()->flash('open_add_form', 'show');
            return redirect()->back()->withInput();
        }
        
            
    }   

    public function edit_form(Request $request){

        $title = $this->edit_title;

        $cat_id = $request->route('id');

        $blog_category = BlogCategory::find($cat_id);


        return view('admin.blog_category_edit')->with(compact('title','blog_category'));

    }

    public function edit_blog_category_save(Request $request){

        $blog_category_id=$request->blog_category_id;

        $blog_category = BlogCategory::find($blog_category_id);
        if($blog_category){

            $request->validate([

               'name'      => 'required',
                'parent_id' => 'nullable|numeric',
                'status'      => 'required',
            ]);


             if($request->hasFile('image')){
                if ($request->file('image')->isValid()) {
                    //$this->path = $request->file('image')->storeAs($this->destinationPath,time().'.'.$request->file('image')->extension());

                    if($request->file('image')->extension() == 'jpg' or $request->file('image')->extension() == 'jpeg' or $request->file('image')->extension() == 'png'){

                        $this->path=$this->destinationPath."/".$blog_category->slug."-".time().'.'.'webp';

                        Image::make($request->file('image'))->encode('webp', 90)->save(storage_path('app')."/".$this->path);

                    } else {
                        
                        $this->path = $request->file('image')->storeAs($this->destinationPath,$blog_category->slug."-".time().'.'.$request->file('image')->extension());
                    }
                    createMultipleImages($this->path,'blogCategory');

                    //For deleting previous uploaded files
                    if(Storage::exists($blog_category->image)){
                        $imageName =basename($blog_category->image);
                        $dirName =dirname($blog_category->image);
                        Storage::delete($blog_category->image);
                        Storage::delete($dirName.'/small/'.$imageName);
                        Storage::delete($dirName.'/medium/'.$imageName);
                    }
                    $blog_category->image = $this->path;


                }
            }

            $blog_category->name = $request->name;
            $blog_category->image_attr = $request->image_attr;
            $blog_category->description = $request->description;
            $blog_category->meta_title = $request->meta_title;
            $blog_category->meta_keyword = $request->meta_keyword;
            $blog_category->meta_desc = $request->meta_desc;
            $blog_category->status = $request->status;

            try{
                $blog_category->save();
                return redirect(route('admin_blog_category_show').get_edit_redirect_query_string())->with('success', $this->blog_category_edit);

            } catch(\Exception $e) {
                return redirect()->back()->with('success', $this->blog_category_edit_error);
            }
        

        } else {

            return redirect()->back()->with('error', $this->blog_category_find_issue);

        }

    }

    public function destroy(Request $request)
    {
        $blog_category_id = $request->blog_category_id;
        if(is_numeric($blog_category_id)){
            if(count(BlogCategory::find($blog_category_id)->get())){
                $blog_category = BlogCategory::find($blog_category_id);
                //For deleting uploaded files
                if($blog_category->image != ''){
                    if(Storage::exists($blog_category->image)){
                        $imageName =basename($blog_category->image);
                        $dirName =dirname($blog_category->image);
                        Storage::delete($blog_category->image);
                        Storage::delete($dirName.'/small/'.$imageName);
                        Storage::delete($dirName.'/medium/'.$imageName);
                    }
                }

                $blog_category->delete();
                return redirect()->back()->with('success', $this->blog_category_delete);
            } else {
                return redirect()->back()->with('error', $this->blog_category_delete_issue);
            }


        } else {
            return redirect(route('admin_blog_category_show'))->with('error', $this->blog_category_delete_issue);

        }
    }



    
}

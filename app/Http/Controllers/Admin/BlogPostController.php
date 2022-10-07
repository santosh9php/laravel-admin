<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\BlogCategory;
use App\Models\Admin\BlogPost;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Log;
use Image;

class BlogPostController extends Controller
{
    public $title='';

    public $edit_title='';

    public $blog_post_add ='';

    public $blog_post_edit ='';

    public $blog_post_find_issue ='';

    public $blog_post_delete = '';

    public $blog_post_delete_issue ='';

    public $blog_post_bulk_status_change ='';

    public $blog_post_bulk_delete ='';

    public $blog_post_add_error ='';

    public $blog_post_edit_error ='';

    public $blog_post_slug_error ='';

    public $path = '';

    public $destinationPath = '';

    public $blog_post_arr=array();

    public function __construct(){

        $this->title =__("adminPageTitle.blog_post");

        $this->edit_title =__("adminPageTitle.edit_blog_post");

        $this->blog_post_add =__("adminMsg.blog_post_add");

        $this->blog_post_edit =__("adminMsg.blog_post_edit");

        $this->blog_post_find_issue =__("adminMsg.blog_post_find_issue");

        $this->blog_post_delete =__("adminMsg.blog_post_delete");

        $this->blog_post_delete_issue =__("adminMsg.blog_post_delete_issue");

        $this->blog_post_bulk_status_change =__("adminMsg.blog_post_bulk_status_change");

        $this->blog_post_bulk_delete =__("adminMsg.blog_post_bulk_delete");

        $this->blog_post_add_error =__("adminMsg.blog_post_add_error");

        $this->blog_post_edit_error =__("adminMsg.blog_post_edit_error");

        $this->blog_post_slug_error =__("adminMsg.blog_post_slug_error");

        $this->destinationPath = 'public/media/blog_post';

        $this->middleware('permission:blog-post-list|blog-post-add|blog-post-edit|blog-post-delete', ['only' => ['index']]);
        $this->middleware('permission:blog-post-add', ['only' => ['add_blog_post_form','add_blog_post']]);
        $this->middleware('permission:blog-post-edit', ['only' => ['edit_form','edit_blog_post_save']]);
        $this->middleware('permission:blog-post-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $title=$this->title;

        $search_by_category=$request->query('search_by_category');

        $search_by_title=$request->query('search_by_title');

        $blog_post_status_ids=$request->query('blog_post_status_ids');

        $blog_post_bulk_delete_ids=$request->query('blog_post_bulk_delete_ids');

        $categories = BlogCategory::orderby('name', 'asc')->get();

        $no_of_records=15;
        
        if($search_by_category  !== null) {

            $blog_posts = BlogPost::where('category_id',$search_by_category)->orderby('title', 'asc')->paginate($no_of_records)->appends(request()->query());

        } else if ($search_by_title !== null){

            $blog_posts = BlogPost::where('title', 'LIKE', '%'.$search_by_title.'%')->orderby('title', 'asc')->paginate($no_of_records)->appends(request()->query());

        } else if ($blog_post_status_ids !== null){

            $blog_post_id_arr = explode(",",$blog_post_status_ids);

            if($request->query('status') == 'active'){
                BlogPost::whereIn('id', $blog_post_id_arr) ->update(['status' => 'active']);
            } else{
                BlogPost::whereIn('id', $blog_post_id_arr) ->update(['status' => 'inactive']);
            }

            $blog_posts = BlogPost::orderby('title', 'asc')->paginate($no_of_records)->appends(request()->query());

            $request->session()->flash('success', $this->blog_post_bulk_status_change);

            return redirect()->back();

        } else if ($blog_post_bulk_delete_ids !== null){

            $blog_post_id_arr = explode(",",$blog_post_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){

                BlogPost::whereIn('id', $blog_post_id_arr) ->delete();

                $request->session()->flash('success', $this->blog_post_bulk_delete);

            } 

           $blog_posts = BlogPost::orderby('title', 'asc')->paginate($no_of_records)->appends(request()->query());

            return redirect()->back();

        } else {

            $blog_posts = BlogPost::orderby('title', 'asc')->paginate($no_of_records)->appends(request()->query());

        }
        
        return view('admin.blog_post')->with(compact('title','blog_posts','categories'));
    }

    public function add_blog_post_form(Request $request)
    {   
        $title=$this->title;

        $categories = BlogCategory::where('status','active')->orderby('name', 'asc')->get();

        return view('admin.blog_post_add')->with(compact('title','categories'));
    }

    public function add_blog_post(Request $request)
    {

        $validatedData = $request->validate([
                'title'      => 'required',
                'category_id'      => 'required',
                'status'      => 'required',
            ]);
        
        $slug =Str::of($request->title)->slug('-');

        if($request->hasFile('image')){
            if ($request->file('image')->isValid()) {
                //$this->path = $request->file('image')->storeAs($this->destinationPath,time().'.'.$request->file('image')->extension());

                if($request->file('image')->extension() == 'jpg' or $request->file('image')->extension() == 'jpeg' or $request->file('image')->extension() == 'png'){

                    $this->path=$this->destinationPath."/".$slug."-".time().'.'.'webp';

                    Image::make($request->file('image'))->encode('webp', 90)->save(storage_path('app')."/".$this->path);

                } else {
                    
                    $this->path = $request->file('image')->storeAs($this->destinationPath,$slug."-".time().'.'.$request->file('image')->extension());
                }
                createMultipleImages($this->path,'blogpost');
            }
        }
       
        try{

            $blogPostObj = BlogPost::create([
                    'category_id' => $request->category_id,
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'image' =>$this->path,
                    'image_attr' =>$request->image_attr,
                    'content' => $request->content,
                    'meta_title' =>$request->meta_title,
                    'meta_keyword' =>$request->meta_keyword,
                    'meta_desc' =>$request->meta_desc,
                    'status' =>$request->status
                ]);

            
            addSlug($blogPostObj,$slug);

            return redirect()->back()->with('success', $this->blog_post_add);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->blog_post_add_error);
            return redirect()->back()->withInput();
        }
        
            
    } 


    public function edit_form(Request $request){

        $title = $this->edit_title;

        $blog_post_id = $request->route('id');

        $categories = BlogCategory::where('status','active')->orderby('name', 'asc')->get();

        $blog_post = BlogPost::find($blog_post_id);


        return view('admin.blog_post_edit')->with(compact('title','blog_post','categories'));

    }

    public function edit_blog_post_save(Request $request){

        $blog_post_id=$request->blog_post_id;

        $blog_post = BlogPost::find($blog_post_id);

        $validatedData = $request->validate([
                'title'      => 'required',
                'category_id'      => 'required',
                'status'      => 'required',
            ]);
       

        if($request->hasFile('image')){
            if ($request->file('image')->isValid()) {
                //$this->path = $request->file('image')->storeAs($this->destinationPath,time().'.'.$request->file('image')->extension());

                if($request->file('image')->extension() == 'jpg' or $request->file('image')->extension() == 'jpeg' or $request->file('image')->extension() == 'png'){

                    $this->path=$this->destinationPath."/".$blog_post->slug."-".time().'.'.'webp';

                    Image::make($request->file('image'))->encode('webp', 90)->save(storage_path('app')."/".$this->path);

                } else {
                    
                    $this->path = $request->file('image')->storeAs($this->destinationPath,$blog_post->slug."-".time().'.'.$request->file('image')->extension());
                }
                createMultipleImages($this->path,'blogpost');

                //For deleting previous uploaded files
                if(Storage::exists($blog_post->image)){
                    $imageName =basename($blog_post->image);
                    $dirName =dirname($blog_post->image);
                    Storage::delete($blog_post->image);
                    Storage::delete($dirName.'/small/'.$imageName);
                    Storage::delete($dirName.'/medium/'.$imageName);
                }
                $blog_post->image = $this->path;


            }
        }
        

        try{
            $blog_post->category_id = $request->category_id;
            $blog_post->user_id = auth()->user()->id;
            $blog_post->title = $request->title;
            $blog_post->image_attr = $request->image_attr;
            $blog_post->content = $request->content;
            $blog_post->meta_title =$request->meta_title;
            $blog_post->meta_keyword =$request->meta_keyword;
            $blog_post->meta_desc =$request->meta_desc;
            $blog_post->status =$request->status;
            
            $blog_post->save();

            return redirect(route('admin_blog_post_show').get_edit_redirect_query_string())->with('success', $this->blog_post_edit);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->blog_post_edit_error);
            return redirect()->back()->withInput();
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

            /*
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
            */
        }
    }



    public function destroy(Request $request)
    {
        $blog_post_id = $request->blog_post_id;
        if(is_numeric($blog_post_id)){
            try{

                $BlogPost = BlogPost::find($blog_post_id);
                //For deleting uploaded files
                if($BlogPost->image != ''){
                    if(Storage::exists($BlogPost->image)){

                        $imageName =basename($BlogPost->image);
                        $dirName =dirname($BlogPost->image);
                        Storage::delete($BlogPost->image);
                        Storage::delete($dirName.'/small/'.$imageName);
                        Storage::delete($dirName.'/medium/'.$imageName);
                    }
                }

                $BlogPost->delete();
                return redirect()->back()->with('success', $this->blog_post_delete);

            } catch(\Exception $e){

                return redirect()->back()->with('error', $this->blog_post_delete_issue);

            } 

        } else {
            return redirect(route('admin_blog_post_show'))->with('error', $this->blog_post_delete_issue);

        }
    }


}

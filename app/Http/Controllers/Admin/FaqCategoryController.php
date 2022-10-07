<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\FaqCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Log;
use Image;

class FaqCategoryController extends Controller
{
public $title='';

    public $edit_title='';

    public $faq_category_add ='';

    public $faq_category_edit ='';

    public $faq_category_find_issue ='';

    public $faq_category_delete = '';

    public $faq_category_delete_issue ='';

    public $faq_category_bulk_status_change ='';

    public $faq_category_bulk_delete ='';

    public $faq_category_add_error ='';

    public $faq_category_edit_error ='';

    public $faq_category_slug_error ='';

    public $path = '';

    public $destinationPath = '';

    public $faq_category_arr=array();

    public function __construct(){

        $this->title =__("adminPageTitle.faq_category");

        $this->edit_title =__("adminPageTitle.edit_faq_category");

        $this->faq_category_add =__("adminMsg.faq_category_add");

        $this->faq_category_edit =__("adminMsg.faq_category_edit");

        $this->faq_category_find_issue =__("adminMsg.faq_category_find_issue");

        $this->faq_category_delete =__("adminMsg.faq_category_delete");

        $this->faq_category_delete_issue =__("adminMsg.faq_category_delete_issue");

        $this->faq_category_bulk_status_change =__("adminMsg.faq_category_bulk_status_change");

        $this->faq_category_bulk_delete =__("adminMsg.faq_category_bulk_delete");

        $this->faq_category_add_error =__("adminMsg.faq_category_add_error");

        $this->faq_category_edit_error =__("adminMsg.faq_category_edit_error");

        $this->faq_category_slug_error =__("adminMsg.faq_category_slug_error");

        $this->destinationPath = 'public/media/faq_category';

        $this->middleware('permission:faq-category-list|faq-category-add|faq-category-edit|faq-category-delete', ['only' => ['index']]);
        $this->middleware('permission:faq-category-add', ['only' => ['add_faq_category']]);
        $this->middleware('permission:faq-category-edit', ['only' => ['edit_form','edit_faq_category_save']]);
        $this->middleware('permission:faq-category-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $title=$this->title;

        $search_faq_category_id=$request->query('search_faq_category');

        $search_by_name=$request->query('search_by_name');

        $faq_category_status_ids=$request->query('faq_category_status_ids');

        $faq_category_bulk_delete_ids=$request->query('faq_category_bulk_delete_ids');

        $no_of_records =15;

        if($search_faq_category_id  !== null) {

            $categories = FaqCategory::where('id',$search_faq_category_id)->orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

        } else if ($search_by_name !== null){

            $categories = FaqCategory::where('name', 'LIKE', '%'.$search_by_name.'%')->orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());
            

        } else if ($faq_category_status_ids !== null){

            $cat_id_arr = explode(",",$faq_category_status_ids);
            if($request->query('status') == 'active'){
                FaqCategory::whereIn('id', $cat_id_arr) ->update(['status' => 'active']);
            } else{
                FaqCategory::whereIn('id', $cat_id_arr) ->update(['status' => 'inactive']);
            }

            $categories = FaqCategory::orderby('name', 'asc')->paginate($no_of_records);

            $request->session()->flash('success', $this->faq_category_bulk_status_change);

            return redirect()->back();

        } else if ($faq_category_bulk_delete_ids !== null){

            $cat_id_arr = explode(",",$faq_category_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){

                FaqCategory::whereIn('id', $cat_id_arr) ->delete();

                $request->session()->flash('success', $this->faq_category_bulk_delete);

            } 

            $categories = FaqCategory::orderby('name', 'asc')->paginate($no_of_records);
           return redirect()->back();

        }else{


            $categories = FaqCategory::orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());;

        }
        
        
        return view('admin.faq_category')->with(compact('title','categories'));
    }

    public function add_faq_category(Request $request)
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
                createMultipleImages($this->path,'faqCategory');
            }
        }

        try{
            $FaqCategoryObj = FaqCategory::create([
                    'name' => $request->name,
                    'image' =>$this->path,
                    'image_attr' =>$request->image_attr,
                    'description' =>$request->description,
                    'meta_title' =>$request->meta_title,
                    'meta_keyword' =>$request->meta_keyword,
                    'meta_desc' =>$request->meta_desc,
                    'status' =>$request->status
                ]);

            
            addSlug($FaqCategoryObj,$slug);


            $request->session()->flash('open_add_form', 'show');
            return redirect()->back()->with('success', $this->faq_category_add);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->faq_category_add_error);
            $request->session()->flash('open_add_form', 'show');
            return redirect()->back()->withInput();
        }
        
            
    }   

    public function edit_form(Request $request){

        $title = $this->edit_title;

        $cat_id = $request->route('id');

        $faq_category = FaqCategory::find($cat_id);


        return view('admin.faq_category_edit')->with(compact('title','faq_category'));

    }

    public function edit_faq_category_save(Request $request){

        $faq_category_id=$request->faq_category_id;

        $faq_category = FaqCategory::find($faq_category_id);
        if($faq_category){

            $request->validate([

               'name'      => 'required',
                'parent_id' => 'nullable|numeric',
                'status'      => 'required',
            ]);


             if($request->hasFile('image')){
                if ($request->file('image')->isValid()) {
                   // $this->path = $request->file('image')->storeAs($this->destinationPath,time().'.'.$request->file('image')->extension());

                    if($request->file('image')->extension() == 'jpg' or $request->file('image')->extension() == 'jpeg' or $request->file('image')->extension() == 'png'){

                        $this->path=$this->destinationPath."/".$faq_category->slug."-".time().'.'.'webp';

                        Image::make($request->file('image'))->encode('webp', 90)->save(storage_path('app')."/".$this->path);

                    } else {
                        
                        $this->path = $request->file('image')->storeAs($this->destinationPath,$faq_category->slug."-".time().'.'.$request->file('image')->extension());
                    }
                    createMultipleImages($this->path,'faqCategory');

                    //For deleting previous uploaded files
                    if(Storage::exists($faq_category->image)){

                        $imageName =basename($faq_category->image);
                        $dirName =dirname($faq_category->image);
                        Storage::delete($faq_category->image);
                        Storage::delete($dirName.'/small/'.$imageName);
                        Storage::delete($dirName.'/medium/'.$imageName);
                    }
                    $faq_category->image = $this->path;


                }
            }

            $faq_category->name = $request->name;
            $faq_category->image_attr = $request->image_attr;
            $faq_category->description = $request->description;
            $faq_category->meta_title = $request->meta_title;
            $faq_category->meta_keyword = $request->meta_keyword;
            $faq_category->meta_desc = $request->meta_desc;
            $faq_category->status = $request->status;

            try{
                $faq_category->save();
                return redirect(route('admin_faq_category_show').get_edit_redirect_query_string())->with('success', $this->faq_category_edit);

            } catch(\Exception $e) {
                return redirect()->back()->with('success', $this->faq_category_edit_error);
            }
        

        } else {

            return redirect()->back()->with('error', $this->faq_category_find_issue);

        }

    }

    public function destroy(Request $request)
    {
        $faq_category_id = $request->faq_category_id;
        if(is_numeric($faq_category_id)){
            if(count(FaqCategory::find($faq_category_id)->get())){
                $faq_category = FaqCategory::find($faq_category_id);
                //For deleting uploaded files
                if($faq_category->image != ''){
                    if(Storage::exists($faq_category->image)){

                        $imageName =basename($faq_category->image);
                        $dirName =dirname($faq_category->image);
                        Storage::delete($faq_category->image);
                        Storage::delete($dirName.'/small/'.$imageName);
                        Storage::delete($dirName.'/medium/'.$imageName);
                    }
                }

                $faq_category->delete();
                return redirect()->back()->with('success', $this->faq_category_delete);
            } else {
                return redirect()->back()->with('error', $this->faq_category_delete_issue);
            }


        } else {
            return redirect(route('admin_faq_category_show'))->with('error', $this->faq_category_delete_issue);

        }
    }



    
}

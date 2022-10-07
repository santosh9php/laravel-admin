<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Page;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public $title='';

    public $edit_title='';

    public $page_add ='';

    public $page_edit ='';

    public $page_find_issue ='';

    public $page_delete = '';

    public $page_delete_issue ='';

    public $page_bulk_status_change ='';

    public $page_bulk_delete ='';

    public $page_add_error ='';

    public $page_edit_error ='';

    public $page_slug_error ='';

    public $path = array();

    public $destinationPath = '';

    public $page_arr=array();

    public function __construct(){

        $this->title =__("adminPageTitle.page");

        $this->edit_title =__("adminPageTitle.edit_page");

        $this->page_add =__("adminMsg.page_add");

        $this->page_edit =__("adminMsg.page_edit");

        $this->page_find_issue =__("adminMsg.page_find_issue");

        $this->page_delete =__("adminMsg.page_delete");

        $this->page_delete_issue =__("adminMsg.page_delete_issue");

        $this->page_bulk_status_change =__("adminMsg.page_bulk_status_change");

        $this->page_bulk_delete =__("adminMsg.page_bulk_delete");

        $this->page_add_error =__("adminMsg.page_add_error");

        $this->page_edit_error =__("adminMsg.page_edit_error");

        $this->page_slug_error =__("adminMsg.page_slug_error");

        $this->destinationPath = 'public/media/page';
    }

    public function index(Request $request)
    {
        $title=$this->title;

        $search_by_name=$request->query('search_by_name');

        $page_status_ids=$request->query('page_status_ids');

        $page_bulk_delete_ids=$request->query('page_bulk_delete_ids');

        $no_of_records=15;
       
        if ($search_by_name !== null){

            $pages = Page::where('name', 'LIKE', '%'.$search_by_name.'%')->orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

        } else if ($page_status_ids !== null){

            $page_id_arr = explode(",",$page_status_ids);

            if($request->query('status') == 'active'){
                Page::whereIn('id', $page_id_arr) ->update(['status' => 'active']);
            } else{
                Page::whereIn('id', $page_id_arr) ->update(['status' => 'inactive']);
            }

            $pages = Page::orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

            $request->session()->flash('success', $this->page_bulk_status_change);

            return redirect()->back();

        } else if ($page_bulk_delete_ids !== null){

            $page_id_arr = explode(",",$page_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){

                Page::whereIn('id', $page_id_arr) ->delete();

                $request->session()->flash('success', $this->page_bulk_delete);

            } 

           $pages = Page::orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

            return redirect()->back();

        } else {

            $pages = Page::orderby('name', 'asc')->paginate($no_of_records)->appends(request()->query());

        }
        
        return view('admin.page')->with(compact('title','pages'));
    }

    public function add_page_form(Request $request)
    {   
        $title=$this->title;

        return view('admin.page_add')->with(compact('title'));
    }

    public function add_page(Request $request)
    {

        $validatedData = $request->validate([
                'name'      => 'required',
                'status'      => 'required',
            ]);
        
        try{

            $pageObj = Page::create([
                    'name' => $request->name,
                    'content' => $request->content,
                    'meta_title' =>$request->meta_title,
                    'meta_keyword' =>$request->meta_keyword,
                    'meta_desc' =>$request->meta_desc,
                    'status' =>$request->status
                ]);

            $slug =Str::of($request->name)->slug('-');
            addSlug($pageObj,$slug);

            return redirect()->back()->with('success', $this->page_add);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->page_add_error);
            return redirect()->back()->withInput();
        }
        
            
    } 


    public function edit_form(Request $request){

        $title = $this->edit_title;

        $page_id = $request->route('id');

        $page = Page::find($page_id);

        return view('admin.page_edit')->with(compact('title','page'));

    }

    public function edit_page_save(Request $request){

        $page_id=$request->page_id;

        $page = page::find($page_id);

        $validatedData = $request->validate([
                'name'      => 'required',
                'status'      => 'required',
            ]);

        try{
            $page->name = $request->name;
            $page->content = $request->content;
            $page->meta_title =$request->meta_title;
            $page->meta_keyword =$request->meta_keyword;
            $page->meta_desc =$request->meta_desc;
            $page->status =$request->status;
            
            $page->save();

            return redirect(route('admin_page_show').get_edit_redirect_query_string())->with('success', $this->page_edit);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->page_edit_error);
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
        $page_id = $request->page_id;
        if(is_numeric($page_id)){
            try{

                Page::find($page_id)->delete();
                return redirect()->back()->with('success', $this->page_delete);

            } catch(\Exception $e){

                return redirect()->back()->with('error', $this->page_delete_issue);

            } 

        } else {
            return redirect(route('admin_page_show'))->with('error', $this->page_delete_issue);

        }
    }


}

<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\FaqCategory;
use App\Models\Admin\Faq;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Log;

class FaqController extends Controller
{
    public $title='';

    public $edit_title='';

    public $faq_add ='';

    public $faq_edit ='';

    public $faq_find_issue ='';

    public $faq_delete = '';

    public $faq_delete_issue ='';

    public $faq_bulk_status_change ='';

    public $faq_bulk_delete ='';

    public $faq_add_error ='';

    public $faq_edit_error ='';

    public $faq_slug_error ='';

    public $path = '';

    public $destinationPath = '';

    public $faq_arr=array();

    public function __construct(){

        $this->title =__("adminPageTitle.faq");

        $this->edit_title =__("adminPageTitle.edit_faq");

        $this->faq_add =__("adminMsg.faq_add");

        $this->faq_edit =__("adminMsg.faq_edit");

        $this->faq_find_issue =__("adminMsg.faq_find_issue");

        $this->faq_delete =__("adminMsg.faq_delete");

        $this->faq_delete_issue =__("adminMsg.faq_delete_issue");

        $this->faq_bulk_status_change =__("adminMsg.faq_bulk_status_change");

        $this->faq_bulk_delete =__("adminMsg.faq_bulk_delete");

        $this->faq_add_error =__("adminMsg.faq_add_error");

        $this->faq_edit_error =__("adminMsg.faq_edit_error");

        $this->faq_slug_error =__("adminMsg.faq_slug_error");

        $this->destinationPath = 'public/media/faq';

        $this->middleware('permission:faq-list|faq-add|faq-edit|faq-delete', ['only' => ['index']]);
        $this->middleware('permission:faq-add', ['only' => ['add_faq_form','add_faq']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit_form','edit_faq_save']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $title=$this->title;

        $search_by_category=$request->query('search_by_category');

        $search_by_question=$request->query('search_by_question');

        $faq_status_ids=$request->query('faq_status_ids');

        $faq_bulk_delete_ids=$request->query('faq_bulk_delete_ids');

        $categories = FaqCategory::orderby('name', 'asc')->get();

        $no_of_records=15;
        
        if($search_by_category  !== null) {

            $faqs = Faq::where('category_id',$search_by_category)->orderby('question', 'asc')->paginate($no_of_records)->appends(request()->query());

        } else if ($search_by_question !== null){

            $faqs = Faq::where('question', 'LIKE', '%'.$search_by_question.'%')->orderby('question', 'asc')->paginate($no_of_records)->appends(request()->query());

        } else if ($faq_status_ids !== null){

            $faq_id_arr = explode(",",$faq_status_ids);

            if($request->query('status') == 'active'){
                Faq::whereIn('id', $faq_id_arr) ->update(['status' => 'active']);
            } else{
                Faq::whereIn('id', $faq_id_arr) ->update(['status' => 'inactive']);
            }

            $faqs = Faq::orderby('question', 'asc')->paginate($no_of_records)->appends(request()->query());

            $request->session()->flash('success', $this->faq_bulk_status_change);

            return redirect()->back();

        } else if ($faq_bulk_delete_ids !== null){

            $faq_id_arr = explode(",",$faq_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){

                Faq::whereIn('id', $faq_id_arr) ->delete();

                $request->session()->flash('success', $this->faq_bulk_delete);

            } 

           $faqs = Faq::orderby('question', 'asc')->paginate($no_of_records)->appends(request()->query());

            return redirect()->back();

        } else {

            $faqs = Faq::orderby('question', 'asc')->paginate($no_of_records)->appends(request()->query());

        }
        
        return view('admin.faq')->with(compact('title','faqs','categories'));
    }

    public function add_faq_form(Request $request)
    {   
        $title=$this->title;

        $categories = FaqCategory::where('status','active')->orderby('name', 'asc')->get();

        return view('admin.faq_add')->with(compact('title','categories'));
    }

    public function add_faq(Request $request)
    {

        $validatedData = $request->validate([
                'question'      => 'required',
                'category_id'      => 'required',
                'status'      => 'required',
            ]);
        

        try{

            $faqObj = Faq::create([
                    'category_id' => $request->category_id,
                    'question' => $request->question,
                    'answer' => $request->answer,
                    'meta_title' =>$request->meta_title,
                    'meta_keyword' =>$request->meta_keyword,
                    'meta_desc' =>$request->meta_desc,
                    'status' =>$request->status
                ]);


            $slug =Str::of($request->question)->slug('-');
            addSlug($faqObj,$slug);

            return redirect()->back()->with('success', $this->faq_add);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->faq_add_error);
            return redirect()->back()->withInput();
        }
        
            
    } 


    public function edit_form(Request $request){

        $title = $this->edit_title;

        $faq_id = $request->route('id');

        $categories = FaqCategory::where('status','active')->orderby('name', 'asc')->get();

        $faq = Faq::find($faq_id);


        return view('admin.faq_edit')->with(compact('title','faq','categories'));

    }

    public function edit_faq_save(Request $request){

        $faq_id=$request->faq_id;

        $faq = Faq::find($faq_id);

        $validatedData = $request->validate([
                'question'      => 'required',
                'category_id'      => 'required',
                'status'      => 'required',
            ]);
        

        try{
            $faq->category_id = $request->category_id;
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->meta_title =$request->meta_title;
            $faq->meta_keyword =$request->meta_keyword;
            $faq->meta_desc =$request->meta_desc;
            $faq->status =$request->status;
            
            $faq->save();

            return redirect(route('admin_faq_show').get_edit_redirect_query_string())->with('success', $this->faq_edit);
        }catch(\Exception $e) {
            $request->session()->flash('error', $this->faq_edit_error);
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
        $faq_id = $request->faq_id;
        if(is_numeric($faq_id)){
            try{

                $Faq = Faq::find($faq_id);
                //For deleting uploaded files
                if($Faq->image != ''){
                    if(Storage::exists($Faq->image)){
                        Storage::delete($Faq->image);
                    }
                }

                $Faq->delete();
                return redirect()->back()->with('success', $this->faq_delete);

            } catch(\Exception $e){

                return redirect()->back()->with('error', $this->faq_delete_issue);

            } 

        } else {
            return redirect(route('admin_faq_show'))->with('error', $this->faq_delete_issue);

        }
    }


}

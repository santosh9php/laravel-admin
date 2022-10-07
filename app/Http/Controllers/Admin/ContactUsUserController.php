<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ContactUsUser;

class ContactUsUserController extends Controller
{
    public $title='';

    public $cont_users_delete = '';

    public $cont_users_delete_issue ='';

    public $cont_users_bulk_status_change ='';

    public $cont_users_bulk_delete ='';

    public $cont_users_arr=array();

    public function __construct(){

        $this->title =__("adminPageTitle.cont_users");

        $this->cont_users_delete =__("adminMsg.cont_users_delete");

        $this->cont_users_delete_issue =__("adminMsg.cont_users_delete_issue");

        $this->cont_users_bulk_status_change =__("adminMsg.cont_users_bulk_status_change");

        $this->cont_users_bulk_delete =__("adminMsg.cont_users_bulk_delete");

        $this->middleware('permission:contact-us-enquiry-list|contact-us-enquiry-delete', ['only' => ['index']]);
        $this->middleware('permission:contact-us-enquiry-delete', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {
        $title=$this->title;

        $search_by_name=$request->query('search_by_name');

        $cont_users_status_ids=$request->query('cont_users_status_ids');

        $cont_users_bulk_delete_ids=$request->query('cont_users_bulk_delete_ids');

        $no_of_records=20;
       
        if ($search_by_name !== null){

            $cont_userss = ContactUsUser ::where('email', 'LIKE', '%'.$search_by_name.'%')->orderby('created_at', 'desc')->paginate($no_of_records)->appends(request()->query());

        }  else if ($cont_users_bulk_delete_ids !== null){

            $cont_users_id_arr = explode(",",$cont_users_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){

                ContactUsUser ::whereIn('id', $cont_users_id_arr) ->delete();

                $request->session()->flash('success', $this->cont_users_bulk_delete);

            } 

           $cont_userss = ContactUsUser ::orderby('created_at', 'desc')->paginate($no_of_records)->appends(request()->query());

            return redirect()->back();

        } else {

            $cont_userss = ContactUsUser ::orderby('created_at', 'desc')->paginate($no_of_records)->appends(request()->query());

        }
        
        return view('admin.cont_users')->with(compact('title','cont_userss'));
    }

    public function destroy(Request $request)
    {
        $cont_users_id = $request->cont_users_id;
        if(is_numeric($cont_users_id)){
            try{

                ContactUsUser ::find($cont_users_id)->delete();
                return redirect()->back()->with('success', $this->cont_users_delete);

            } catch(\Exception $e){

                return redirect()->back()->with('error', $this->cont_users_delete_issue);

            } 

        } else {
            return redirect(route('admin_cont_users_show'))->with('error', $this->cont_users_delete_issue);

        }
    }
}

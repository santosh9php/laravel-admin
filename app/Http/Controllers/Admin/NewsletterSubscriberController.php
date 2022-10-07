<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\NewsletterSubscriber;

class NewsletterSubscriberController extends Controller
{
    public $title='';

    public $news_subs_delete = '';

    public $news_subs_delete_issue ='';

    public $news_subs_bulk_status_change ='';

    public $news_subs_bulk_delete ='';

    public $news_subs_arr=array();

    public function __construct(){

        $this->title =__("adminPageTitle.news_subs");

        $this->news_subs_delete =__("adminMsg.news_subs_delete");

        $this->news_subs_delete_issue =__("adminMsg.news_subs_delete_issue");

        $this->news_subs_bulk_status_change =__("adminMsg.news_subs_bulk_status_change");

        $this->news_subs_bulk_delete =__("adminMsg.news_subs_bulk_delete");

        $this->middleware('permission:newsletter-list|newsletter-delete', ['only' => ['index']]);
        $this->middleware('permission:newsletter-delete', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {
        $title=$this->title;

        $search_by_name=$request->query('search_by_name');

        $news_subs_status_ids=$request->query('news_subs_status_ids');

        $news_subs_bulk_delete_ids=$request->query('news_subs_bulk_delete_ids');

        $no_of_records=20;
       
        if ($search_by_name !== null){

            $news_subss = NewsletterSubscriber ::where('email', 'LIKE', '%'.$search_by_name.'%')->orderby('created_at', 'desc')->paginate($no_of_records)->appends(request()->query());

        }  else if ($news_subs_bulk_delete_ids !== null){

            $news_subs_id_arr = explode(",",$news_subs_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){

                NewsletterSubscriber ::whereIn('id', $news_subs_id_arr) ->delete();

                $request->session()->flash('success', $this->news_subs_bulk_delete);

            } 

           $news_subss = NewsletterSubscriber ::orderby('created_at', 'desc')->paginate($no_of_records)->appends(request()->query());

            return redirect()->back();

        } else {

            $news_subss = NewsletterSubscriber ::orderby('created_at', 'desc')->paginate($no_of_records)->appends(request()->query());

        }
        
        return view('admin.news_subs')->with(compact('title','news_subss'));
    }

    public function destroy(Request $request)
    {
        $news_subs_id = $request->news_subs_id;
        if(is_numeric($news_subs_id)){
            try{

                NewsletterSubscriber ::find($news_subs_id)->delete();
                return redirect()->back()->with('success', $this->news_subs_delete);

            } catch(\Exception $e){

                return redirect()->back()->with('error', $this->news_subs_delete_issue);

            } 

        } else {
            return redirect(route('/newsletter/subscriber'))->with('error', $this->news_subs_delete_issue);

        }
    }


}

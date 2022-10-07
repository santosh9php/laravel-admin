<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegister;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendUserRegisterEmailJob;
use Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

use Image;

class AdminUserController extends Controller
{
    public $title='';

    public $edit_title='';

    public $user_add ='';

    public $user_edit ='';

    public $user_find_issue ='';

    public $user_delete = '';

    public $user_delete_issue ='';

    public $user_bulk_status_change ='';

    public $user_bulk_delete ='';

    public $user_add_error ='';

    public $user_edit_error ='';

    public $password_validation_error='';

    public $email_verification_link = '';

    public $path = '';

    public $destinationPath = '';

    public $user_arr=array();

    public function __construct(){

        $this->title =__("adminPageTitle.user");

        $this->edit_title =__("adminPageTitle.edit_user");

        $this->user_add =__("adminMsg.user_add");

        $this->user_edit =__("adminMsg.user_edit");

        $this->user_find_issue =__("adminMsg.user_find_issue");

        $this->user_delete =__("adminMsg.user_delete");

        $this->user_delete_issue =__("adminMsg.user_delete_issue");

        $this->user_bulk_status_change =__("adminMsg.user_bulk_status_change");

        $this->user_bulk_delete =__("adminMsg.user_bulk_delete");

        $this->user_add_error =__("adminMsg.user_add_error");

        $this->user_edit_error =__("adminMsg.user_edit_error");

        $this->password_validation_error=__('adminMsg.password_validation_error');

        $this->email_verification_link=__('adminMsg.email_verification_link');

        $this->destinationPath = 'public/media/user';

        $this->middleware('permission:user-list|user-add|user-edit|user-delete', ['only' => ['index']]);
        $this->middleware('permission:user-add', ['only' => ['add_user_form','add_user']]);
        $this->middleware('permission:user-edit', ['only' => ['edit_form','edit_user_save']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {
        $title=$this->title;

        $search_by_role =$request->query('search_by_role');

        $order_by =$request->query('order_by');

        $search_by_name=$request->query('search_by_name');

        $user_status_ids=$request->query('user_status_ids');

        $user_bulk_delete_ids=$request->query('user_bulk_delete_ids');

        $no_of_records=50;

        if($search_by_role !== null){

            $users = User::whereHas("roles", function(Builder $query) use($search_by_role)
                { 
                    $query->where("id", $search_by_role); 

                })->orderby('fname', 'asc')->orderby('lname', 'asc')->paginate($no_of_records)->appends(request()->query());

        } else if($order_by  !== null) {

            if($order_by == 'user_name_asc'){

                $users = User::orderBy('fname','asc')->orderBy('lname','asc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'user_name_desc'){

                $users = User::orderBy('fname','desc')->orderBy('lname','desc')->paginate($no_of_records)->appends(request()->query());

            }else if($order_by == 'created_at_asc'){

                $users = User::orderBy('created_at','asc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'created_at_desc'){

                $users = User::orderBy('created_at','desc')->paginate($no_of_records)->appends(request()->query());

            }  else if($order_by == 'status_active') {

                 $users = User::orderBy('status','asc')->paginate($no_of_records)->appends(request()->query());

            } else if($order_by == 'status_inactive') {

                 $users = User::orderBy('status','desc')->paginate($no_of_records)->appends(request()->query());

            } 

        } else if ($search_by_name !== null){

            $users = User::where('fname', 'LIKE', '%'.$search_by_name.'%')->orwhere('lname', 'LIKE', '%'.$search_by_name.'%')->orderby('fname', 'asc')->orderby('lname', 'asc')->paginate($no_of_records)->appends(request()->query());

        }  else if ($user_status_ids !== null){

            $user_id_arr = explode(",",$user_status_ids);

            if($request->query('status') == 'active'){
                User::whereIn('id', $user_id_arr) ->update(['status' => 'active']);
            } else{
                User::whereIn('id', $user_id_arr) ->update(['status' => 'inactive']);
            }

            $users = User::orderby('fname', 'asc')->orderby('lname', 'asc')->paginate($no_of_records)->appends(request()->query());

            $request->session()->flash('success', $this->user_bulk_status_change);

            return redirect()->back();

        } else if ($user_bulk_delete_ids !== null){

            $user_id_arr = explode(",",$user_bulk_delete_ids);

            if($request->query('status') == 'bulk_delete'){


                foreach($user_id_arr as $user_id){

                    $user = User::find($user_id);

                    //For deleting uploaded photo

                    if(!is_null($user->photo)){
                        $image = $user->photo;
                        if(Storage::exists($image)){
                            Storage::delete($image);
                        }
                    }

                }

                User::whereIn('id', $user_id_arr) ->delete();

                $request->session()->flash('success', $this->user_bulk_delete);

            } 

           $users = User::orderby('fname', 'asc')->orderby('lname', 'asc')->paginate($no_of_records)->appends(request()->query());

            return redirect()->back();

        } else {

            $users = User::orderby('created_at', 'desc')->paginate($no_of_records)->appends(request()->query());

        }

        $roles = Role::orderBy('name','asc')->get();
        
        return view('admin.admin_user')->with(compact('title','users','roles'));
    }


    public function add_user_form(Request $request){

        $title=$this->title;

        $countries = Country::orderby('name','asc')->get();

        $roles = Role::pluck('name','name')->all();


        return view('admin.admin_user_add')->with(compact('title','countries','roles'));

    }

    public function add_user(Request $request){
        // validate 
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'country' =>'required',
            'state' =>'required',
            'email' => 'required|unique:users|email',
            'password'=>[
                            'required',
                            'string',
                            'min:7',              // must be at least 7 characters in length
                            'confirmed',
                            'regex:/[a-z]/',      // must contain at least one lowercase letter
                            'regex:/[A-Z]/',      // must contain at least one uppercase letter
                            'regex:/[0-9]/',      // must contain at least one digit
                            'regex:/[@$!%*#?&]/', // must contain a special character
                        ],
            'password_confirmation'=>'required',
            'gender'=>'required',
            'country_code'=>'required',
            'mobile' =>'required|unique:users|regex:/^([0-9]{10})$/|max:10',
            'photo'=>'nullable|mimes:jpg,png,jpeg,webp',
            'role' => 'required',
        ],
        [
            'password.regex'=>$this->password_validation_error
        ]);

        // save in users table 
        
        //Enable query log
        //DB::enableQueryLog();



         if($request->hasFile('photo')){
            if ($request->file('photo')->isValid()) {
                //$this->path = $request->file('photo')->storeAs($this->destinationPath,time().'.'.$request->file('photo')->extension());

                if($request->file('photo')->extension() == 'jpg' or $request->file('photo')->extension() == 'jpeg' or $request->file('photo')->extension() == 'png'){

                    $this->path=$this->destinationPath."/".$request->fname."-".$request->lname."-".time().'.'.'webp';

                    Image::make($request->file('photo'))->encode('webp', 90)->save(storage_path('app')."/".$this->path);

                } else {
                    
                   $this->path = $request->file('photo')->storeAs($this->destinationPath,$request->fname."-".$request->lname."-".time().'.'.$request->file('photo')->extension());
                }
                createMultipleImages($this->path,'user');
            }
        }


        
        $user = User::create([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'country'=>$request->country,
            'state'=>$request->state,
            'email'=>$request->email,
            'password'=> \Hash::make($request->password),
            'country_code'=>$request->country_code,
            'mobile'=>$request->mobile,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'photo'=>$this->path,
        ]);

    
        // login user here 
        
        if($user){

            $user->assignRole($request->input('role'));
           
            $userArr=[
                'name'=>$request->fname." ".$request->lname,
                'email'=>$request->email,
                'password'=>$request->password,
                'country_code'=>$request->country_code,
                'mobile'=>$request->mobile,
            ];

            try {
                event(new Registered($user));
                //auth()->login($user);
                Mail::to($request->email)->send(new UserRegister($userArr));
            } catch (Exception $ex) {dd($e->getMessage());}

           // $str=$this->save."<br> email id : $request->email <br> Password : $request->password";
            $str=$this->user_add;
            return redirect(route('admin_user_form_show'))->with(['success'=>$str, 'title'=>$this->title]);
        }

        return redirect(route('admin_user_form_show'))->with(['error'=>$this->user_add_error,'title'=>$this->title]);


    }



    public function edit_form(Request $request){

        $title = $this->edit_title;

        $user_id = $request->route('id');

        $data = User::find($user_id);

        $countries = Country::orderby('name','asc')->get();

        $states = State::where('country','India')->orderby('name','asc')->get();

        $roles = Role::pluck('name','name')->all();

        $userRole = $data->roles->pluck('name','name')->all();

        return view('admin.admin_user_edit')->with(compact('title','data','countries','states','roles','userRole'));
    }


    public function edit_user_save(Request $request){

        $id = $request->user_id;

        $userObj = User::find($id);

        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'country' =>'required',
            'state' =>'required',
            'country_code'=>'required',
            'mobile' =>['required','regex:/^([0-9]{10})$/','max:10',Rule::unique('users')->ignore($userObj->id)],
            'photo'=>'nullable|mimes:jpg,png,jpeg,webp',
            'role' => 'required',

           // ['required',Rule::unique('categories')->ignore($category->id)]
        ]);

        $userObj->fname=$request->fname;
        $userObj->lname=$request->lname;
        $userObj->country=$request->country;
        $userObj->state=$request->state;
        $userObj->country_code=$request->country_code;
        $userObj->mobile=$request->mobile;
        $userObj->gender=$request->gender;
        $userObj->address=$request->address;
        $userObj->status=$request->status;

        

        if($request->hasFile('photo')){
            if ($request->file('photo')->isValid()) {
                //$this->path = $request->file('photo')->storeAs($this->destinationPath,time().'.'.$request->file('photo')->extension());

                if($request->file('photo')->extension() == 'jpg' or $request->file('photo')->extension() == 'jpeg' or $request->file('photo')->extension() == 'png'){

                    $this->path=$this->destinationPath."/".$userObj->fname."-".$userObj->lname."-".time().'.'.'webp';

                    Image::make($request->file('photo'))->encode('webp', 90)->save(storage_path('app')."/".$this->path);

                } else {
                    
                   $this->path = $request->file('photo')->storeAs($this->destinationPath,$userObj->fname."-".$userObj->lname."-".time().'.'.$request->file('photo')->extension());
                }
                createMultipleImages($this->path,'user');

                //For deleting previous uploaded files
                if(Storage::exists($userObj->photo)){
                    
                    $imageName =basename($userObj->photo);
                    $dirName =dirname($userObj->photo);
                    Storage::delete($userObj->photo);
                    Storage::delete($dirName.'/small/'.$imageName);
                    Storage::delete($dirName.'/medium/'.$imageName);
                }

                $userObj->photo=$this->path;

            }
        }



       if($userObj->save()){

            DB::table('model_has_roles')->where('model_id',$userObj->id)->delete();
    
            $userObj->assignRole($request->input('role'));

            return redirect(route('admin_user_show').get_edit_redirect_query_string())->with(['success'=>$this->user_edit,'title'=> $this->title]);
       } else{

            $request->session()->flash('error', $this->user_edit_error);
            
            return redirect()->back()->withInput();

       }
    }

    
    public function destroy(Request $request)
    {
        $user_id = $request->user_id;
        if(is_numeric($user_id)){
            try{
                $user = User::find($user_id);
                //For deleting uploaded files
                if($user->photo != ''){
                    if(Storage::exists($user->photo)){

                        $imageName =basename($user->photo);
                        $dirName =dirname($user->image);
                        Storage::delete($user->photo);
                        Storage::delete($dirName.'/small/'.$imageName);
                        Storage::delete($dirName.'/medium/'.$imageName);
                    }
                }
                $user->delete();
                return redirect()->back()->with('success', $this->user_delete);
            } catch(\Exception $e){
                return redirect()->back()->with('error', $this->user_delete_issue);
            } 
        } else {
            return redirect(route('admin_user_show'))->with('error', $this->user_delete_issue);
        }
    }


    public function generate(Request $request)
    {
        $id = $request->id;

        $userObj = User::find($id);

        $userObj->sendEmailVerificationNotification();

        return back()->with(['title'=>$this->title,'success'=> $this->email_verification_link]);
    }

    public function fetch_state(Request $request){

        $country = $request->country;

        $response ='';

        if($country and $country == 'India'){

            $states = array();

            $states = State::where('country',$country)->orderby('name','asc')->get();

            if($states and count($states) > 0){

                $response ='<select class="default-select form-control wide" name="state" id="state" required ><option value="">Select State</option>';
                    foreach($states as $state){
                         $response .='<option value="'.$state->name.'">'.$state->name.'</option>';
                    }
                $response .='</select>';
            }
        } else {

            $response ='<input type="text" name="state" id="state" value="" class="form-control" required />';
        }


        return response()->json([
            'state' => $response,
        ]);
    }

    

}
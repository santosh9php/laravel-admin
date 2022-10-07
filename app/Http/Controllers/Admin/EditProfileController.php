<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Storage;
use Image;

class EditProfileController extends Controller
{
    //
    public $title='';

    public $view_profile_title='';


    public $destinationPath = '';

    public $path = '';

    public $save='';

    public $error='';

    public function __construct(){

        $this->title=__("adminPageTitle.edit_profile_title"); 
        $this->view_profile_title=__("adminPageTitle.view_profile_title"); 
        $this->save=__('adminMsg.edit_profile_save');
        $this->error=__('adminMsg.edit_profile_error');
        $this->destinationPath = 'public/media/user';
       

    }

    public function index(){

        $id = Auth::id();

        $data = User::find($id);
        $title=$this->title;
        $countries = Country::orderby('name','asc')->get();
        $states = State::where('country','India')->orderby('name','asc')->get();


        return view('admin.edit_profile',compact('data','title','countries','states'));
    }

    public function view_profile(){

        $id = Auth::id();

        $data = User::find($id);
        $title=$this->view_profile_title;

        return view('admin.view_profile',compact('data','title'));
    }

    public function edit_profile(Request $request){

        $id = Auth::id();

        $userObj = User::find($id);


        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'country' =>'required',
            'state' =>'required',
            'country_code'=>'required',
            'mobile' =>['required','regex:/^([0-9]{10})$/','max:10',Rule::unique('users')->ignore($userObj->id)],

           // ['required',Rule::unique('categories')->ignore($category->id)]
        ]);

        

        

        $userObj->fname=$request->fname;
        $userObj->lname=$request->lname;
        $userObj->country_code=$request->country_code;
        $userObj->mobile=$request->mobile;
        $userObj->gender=$request->gender;
        $userObj->address=$request->address;
        $userObj->country=$request->country;
        $userObj->state=$request->state;



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
           return redirect(route('admin_editpf'))->with(['success'=>$this->save,'title'=> $this->title]);
       } else{
           return redirect(route('admin_editpf'))->with(['error'=>$this->error, 'title' => $this->title]);

       }
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

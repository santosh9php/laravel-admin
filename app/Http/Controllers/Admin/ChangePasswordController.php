<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ChangePassword;
use App\Jobs\SendUserChangePassJob;
use Storage;
use Illuminate\Support\Facades\Log;
use Hash;
use Illuminate\Support\Facades\App;

class ChangePasswordController extends Controller
{
    //

    public $title='';

    public $password_not_match ='';

    public $password_not_same ='';

    public $save='';

    public $error='';

    public $password_validation_error='';

    public function __construct(){

        $this->title=__("adminPageTitle.change_password_title"); 
        $this->password_not_match=__('adminMsg.change_password_not_match');
        $this->password_not_same=__('adminMsg.change_password_not_same');
        $this->save=__('adminMsg.change_password_save');
        $this->error=__('adminMsg.change_password_error');
        $this->password_validation_error=__('adminMsg.password_validation_error');
    }

    public function index(){

        return view('admin.change_password',['title'=>$this->title]);
    }

    public function change_password(Request $request){

        $request->validate([
            'old_password'=>'required|min:7',
            //'new_password'=>'required|min:7|confirmed',
            'new_password' => [
                            'required',
                            'string',
                            'min:7',              // must be at least 7 characters in length
                            'confirmed',
                            'regex:/[a-z]/',      // must contain at least one lowercase letter
                            'regex:/[A-Z]/',      // must contain at least one uppercase letter
                            'regex:/[0-9]/',      // must contain at least one digit
                            'regex:/[@$!%*#?&]/', // must contain a special character
                        ],
            'new_password_confirmation'=>''
        ],
        [
            'new_password.regex'=>$this->password_validation_error
        ]);

        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error",$this->password_not_match);
        }

        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error",$this->password_not_same);
        }


        

        $id = Auth::id();

        $userObj = User::find($id);

        $userObj->password=Hash::make($request->new_password);

       if($userObj->save()){

           //SendUserChangePassJob::dispatch($userObj,$request->new_password);

           $userArr=[
            'name'=>$userObj->fname." ".$userObj->lname,
            'email'=>$userObj->email,
            'password'=>$request->new_password,
            'mobile'=>$userObj->mobile,
            'role'=>$userObj->role,
           ];
           try{
             Mail::to($userObj->email)->send(new ChangePassword($userArr));
             } catch (Exception $ex) {dd($e->getMessage());}

           return redirect(route('admin_changeup'))->with(['success'=>$this->save,'title'=> $this->title]);
       } else{
           return redirect(route('admin_changeup'))->with(['error'=>$this->error, 'title' => $this->title]);

       }


    }
}

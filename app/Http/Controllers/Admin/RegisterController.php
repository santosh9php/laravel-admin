<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegister;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendUserRegisterEmailJob;
use Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Auth\Events\Registered;
use Image;

class RegisterController extends Controller
{   
    public $title = '';

    public $destinationPath = '';

    public $path = '';

    public $save='';

    public $error='';

    public $password_validation_error='';

    public function __construct(){

        $this->title=__("adminPageTitle.register_title"); 
        $this->save=__('adminMsg.register_save');
        $this->error=__('adminMsg.register_error');
        $this->password_validation_error=__('adminMsg.password_validation_error');
        $this->destinationPath = 'public/media/user';
    }

    public function index()
    {
        $countries = Country::orderby('name','asc')->get();
        return view('admin.register')->with(['title'=>$this->title,'countries'=>$countries]);
    }

    public function register(Request $request){
        // validate 
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
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
            'email'=>$request->email,
            'password'=> \Hash::make($request->password),
            'country_code'=>$request->country_code,
            'mobile'=>$request->mobile,
            'role'=>'admin',
            'gender'=>$request->gender,
            'address'=>$request->address,
            'photo'=>$this->path,
            'status'=>'active',
        ]);

        
        //dd(DB::getQueryLog()); // Show results of log

    
        // login user here 
        
        if($user){
           
            //SendUserRegisterEmailJob::dispatch($user,$request->password);

            $userArr=[
                'name'=>$request->fname." ".$request->lname,
                'email'=>$request->email,
                'password'=>$request->password,
                'mobile'=>$request->mobile,
                'role'=>$request->role,
            ];

            try {
                event(new Registered($user));
                //auth()->login($user);
                Mail::to($request->email)->send(new UserRegister($userArr));
            } catch (Exception $ex) {dd($e->getMessage());}

           // $str=$this->save."<br> email id : $request->email <br> Password : $request->password";
            $str=$this->save;
            return redirect(route('admin_register'))->with(['success'=>$str, 'title'=>$this->title]);
        }

        return redirect(route('admin_register'))->with(['error'=>$this->error,'title'=>$this->title]);


    }

}

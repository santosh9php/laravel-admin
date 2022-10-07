<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Hash;
use Validator;

class AuthController extends Controller
{

  public $title='';

  public $login_title='';

  public $email_not_verified ='';

  public $error ='';

  public $account_not_approve ='';


  public function __construct(){

    $this->title = __('adminPageTitle.dashboard_title');

    $this->login_title = __("adminPageTitle.login_title"); 

    $this->email_not_verified = __('adminMsg.email_not_verified');

    $this->error=__('adminMsg.login_error');

    $this->account_not_approve=__('adminMsg.account_not_approve');
  }

  public function index()
    {
        $email ='';
        $password ='';
        $remember ='';
        if(isset($_COOKIE['email']) and  $_COOKIE['email'] != '' and  isset($_COOKIE['password']) and  $_COOKIE['password'] != ''){

            if(isset($_COOKIE['email'])){
                $email = $_COOKIE['email'];
            }
            if(isset($_COOKIE['password'])){
                $password = $_COOKIE['password'];
            }
            if(isset($_COOKIE['remember'])){
                $remember = $_COOKIE['remember'];
            }

        } else {

            $email = old('email');

            $password = old('password');

            $remember = old('remember');
        }
        //$request->session()->flash('email', $email);
        //$request->session()->flash('password', $password);
        //$request->session()->flash('remember', $remember);
        return view('admin.login')->with(['title'=>$this->login_title,'email'=>$email,'password'=>$password,'remember'=>$remember]);
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:7'
            //"password"=>[
            // Password::min(8)->letters()->mixedCase()->symbols()
        ]);
        $remember = $request->has('remember') ? true : false; 
        


        /*
        // save in users table directory 
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> \Hash::make($request->password)
        ]);

        */

        // login code ['email' => $email, 'password' => $password], $remember
        
       // if(Auth::attempt($request->only('email','password'))){
        if(Auth::attempt(['email' => $request->email,'password' => $request->password],$remember)){
            if(!isset(auth()->user()->email_verified_at)){
                Auth::logout();
                $request->session()->flash('login', $this->email_not_verified); 
                $request->session()->flash('title', $this->title);
                return redirect(route('admin_login'))->withInput();
            }

            if(auth()->user()->status == 'inactive'){
                Auth::logout();
                $request->session()->flash('login', $this->account_not_approve); 
                return redirect(route('admin_login'))->withInput();
            }

            if($remember){
                setcookie('email',$request->email,time()+60*60*24*365);
                setcookie('password',$request->password,time()+60*60*24*365);
                setcookie('remember',"checked",time()+60*60*24*365);

            } else {
                setcookie('email','',100);
                setcookie('password','',100);
                setcookie('remember','',100);

            }
            $request->session()->regenerate();

            return redirect(route('admin_dashboard'))->with('title', $this->title);
        }

        $request->session()->flash('login', $this->error);
        $request->session()->flash('title', $this->title);

        //return redirect(route('admin_login'))->with(['login'=>$this->error, 'title' => $this->title]);
        return redirect(route('admin_login'))->withInput();

    }


    public function dashboard(){
       // echo config("constants.dashboard_title");
        return view('admin.dashboard',['title'=>$this->title]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('admin_login'))->with('title', $this->title);
    }


   
    

    /*

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request){
        // validate 
        $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users|email',
            'password'=>'required|confirmed'
        ]);

        // save in users table 
        
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> \Hash::make($request->password)
        ]);

        // login user here 
        
        if(\Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }

        return redirect('register')->withError('Error');


    }

    */

    
    /*
   public function login(Request $request)
   {

    $remember=true;


    $request->validate([
      "email"=>'required|string|email',
      "password"=>'required',
      //"password"=>[
      // Password::min(8)->letters()->mixedCase()->symbols()
     
     ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      echo "<pre>";
      print_r($request->session()->all());
      exit;
              return redirect()->intended('dashboard')->withSuccess('Signed in');

          }
          */
              
            /*
            //For direct user creation  
            User::create([
              'name' =>'Admin',
              'email' => $request->email,
              'password' => Hash::make($request->password)
            ]);
            */

        //echo "<pre>";
        //print_r($request->session()->all());

       // return redirect("login")->withSuccess('Login details are not valid');

    /*
    $data = New Login;
    $data->email = $request->email;
    $data->password = $request->password;
    $data->save();
    $email = $request->email;
    $password = $request->password;
    $user= Login::where(['email'=>$email])->first();
  if($user->email || $user->password)
  {
    return redirect("content");
  }
   
   else
   {
    return "Valid email";
   }
   
   */
  // }
}

<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\Admin\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserEmailVerificationController extends Controller
{

    public $title = '';

    public $email_verified ='';

    public $email_verify_issue ='';


    public function __construct(){

        $this->title=__("adminPageTitle.login_title"); 

        $this->email_verified=__("adminMsg.email_verified"); 

        $this->email_verify_issue=__("adminMsg.email_verify_issue"); 
       
    }
    public function show(Request $request)
    {

        if(isset(auth()->user()->email_verified_at ) && auth()->user()->email_verified_at != '-0001-11-30 00:00:00'){
            
            if (Auth::user()->hasRole('Super Admin') OR Auth::user()->hasPermissionTo('admin-login')) {

                return redirect(route('admin_dashboard'))->with(['title'=>$this->title]);

            } else {

                return redirect(route('home'));

            }
        }
        if (Auth::user()->hasRole('Super Admin') OR Auth::user()->hasPermissionTo('admin-login')) {

            return view('admin.verify-email')->with(['title'=>$this->title]);

        } else {

            return redirect(route('home'));

        }
    }

    public function request(Request $request)
    {
        auth()->user()->sendEmailVerificationNotification();

        if (Auth::user()->hasRole('Super Admin') OR Auth::user()->hasPermissionTo('admin-login')) {

            return redirect(route('user_dashboard'))->with(['title'=>$this->title,'success'=> 'Email  Verification link sent!']);

        } else {

            //$request->session()->flash('success', 'Email Verification link sent!');

            //return redirect(route('user_dashboard'));

            return redirect(route('home'));

        }
    }

    

    public function verify(Request $request)
    {
        $user = User::find($request->route('id'));

        if(!$user)
        {
            return abort(404);
        }

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {

            //throw new AuthorizationException; Commented by santosh

            if ($user->hasRole('Super Admin') OR $user->hasPermissionTo('admin-login')) {

                return redirect(route('admin_login'))->with('verified', $this->email_verify_issue);

            } else {

                //return redirect(route('user_login'))->with('verified', $this->home_email_verify_issue);

                 return redirect(route('home'));

            }
        }
    
        if ($user->markEmailAsVerified())

            try{

                event(new Verified($user));
                

                if ($user->hasRole('Super Admin') OR $user->hasPermissionTo('admin-login')) {

                   return redirect(route('admin_login'))->with('verified', $this->email_verified);

                } else {

                   //return redirect(route('user_login'))->with('verified', $this->home_email_verified);

                     return redirect(route('home'));

                }


            } catch(\Exception $e) {

                if ($user->hasRole('Super Admin') OR $user->hasPermissionTo('admin-login')) {

                   return redirect(route('admin_login'))->with('verified', $this->email_verify_issue);


                } else {

                   //return redirect(route('user_login'))->with('verified', $this->home_email_verify_issue);

                     return redirect(route('home'));

                }

            }
    } 


    
}

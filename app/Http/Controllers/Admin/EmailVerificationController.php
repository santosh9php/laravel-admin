<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\Admin\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;

class EmailVerificationController extends Controller
{
    public $title = '';

    public function __construct(){

        $this->title=__("adminPageTitle.login_title"); 

        $this->email_verified=__("adminMsg.email_verified"); 

        $this->email_verify_issue=__("adminMsg.email_verify_issue"); 
       
    }
    public function show()
    {
        if(isset(auth()->user()->email_verified_at)){
            return redirect(route('admin_dashboard'))->with(['title'=>$this->title]);
        }
        return view('admin.verify-email')->with(['title'=>$this->title]);
    }

    public function request()
    {
        auth()->user()->sendEmailVerificationNotification();

        return back()->with(['title'=>$this->title,'success'=> 'Verification link sent!']);
    }

    /*
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect(route('admin_dashboard')); // <-- change this to whatever you want
    }
    */

    public function verify(Request $request)
    {
        $user = User::find($request->route('id'));

        if(!$user)
        {
            return redirect(route('admin_login'))->with('verified', $this->email_verify_issue);
        }

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {

            //throw new AuthorizationException; Commented by santosh
             return redirect(route('admin_login'))->with('verified', $this->email_verify_issue);
        }
    
        if ($user->markEmailAsVerified())

            try{

                event(new Verified($user));
                return redirect(route('admin_login'))->with('verified', $this->email_verified);
                //return redirect(route('admin_dashboard')); // The deep link

            } catch(\Exception $e) {

                return redirect(route('admin_login'))->with('verified', $this->email_verify_issue);

            }
        } 
}

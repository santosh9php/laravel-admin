<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

use Hash;
use Str;

class ForgotController extends Controller
{
    //

    public $title='';

    public function __construct(){

        $this->title=__("adminPageTitle.forgot_title"); 
    }

    public function index(){

      return view('admin.forgot_password')->with(['title'=>$this->title]);
    }

    public function forgotPasswordResetLink(Request $request){



        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );


     
      return $status === Password::RESET_LINK_SENT ? back()->with(['title'=>$this->title,'status' => __($status)]) : back()->withErrors(['title'=>$this->title,'email' => __($status)]);
    }

}

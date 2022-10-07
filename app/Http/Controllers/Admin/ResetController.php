<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Validator;
use Hash;
use Str;
class ResetController extends Controller
{
    //
    public $title='';

    public $password_validation_error='';

    public function __construct(){

        $this->title=__("adminPageTitle.reset_title"); 
        $this->password_validation_error=__('adminMsg.password_validation_error');
    }

    public function index($token){


        return view('admin.reset_password', ['token' => $token,'title'=>$this->title]);
    }

    public function password_update(Request $request){

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
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
        ],
        [
            'password.regex'=>$this->password_validation_error
        ]);
 
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
 
        return $status === Password::PASSWORD_RESET  ? redirect()->route('admin_login')->with(['status'=> __($status),'title'=>$this->title]) : back()->withErrors(['email' => [__($status)],'title'=>$this->title]);
    }
}

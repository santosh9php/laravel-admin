<?php

namespace App\Http\Controllers\Admin;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\Admin\User;

class SocialController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function callback()
    {
        try {
    
            $user = Socialite::driver('google')->user();

     
            $finduser = User::where('social_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect(route('admin_dashboard'));
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                    'password' => encrypt('google123456')
                ]);
    
                Auth::login($newUser);
     
                return redirect(route('admin_dashboard'));
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

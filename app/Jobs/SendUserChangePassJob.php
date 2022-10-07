<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ChangePassword;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendUserChangePassJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user;

    public $password;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 25;
 
    /**
     * The maximum number of unhandled exceptions to allow before failing.
     *
     * @var int
     */
    public $maxExceptions = 3;
 
    /**
     * Execute the job.
     *
     * @return void
     */

    public function __construct(User $user, $password)
    {
        //
        $this->user=$user;
        $this->password=$password;
        
    }

    public function handle()
    {
        //
        $userArr=[
            'name'=>$this->user->name,
            'email'=>$this->user->email,
            'password'=>$this->password,
            'mobile'=>$this->user->mobile,
            'role'=>$this->user->role,
        ];

        //Log::info('User failed to login1111.'.print_r($this->user,1));
        //Log::info('User failed to login.'.print_r($userArr,1));


         Mail::to($userArr['email'])->send(new ChangePassword($userArr));
    }
}

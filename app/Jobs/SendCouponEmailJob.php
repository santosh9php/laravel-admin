<?php

namespace App\Jobs;
use App\Models\Admin\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendCoupon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;



class SendCouponEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $coupon;



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

    public function __construct($coupon)
    {
        $this->coupon=$coupon;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $couponArr=[

            'name'=>$this->coupon['name'],

            'email'=>$this->coupon['email'],

            'discount_type'=>$this->coupon['discount_type'],

            'cart_discount'=>$this->coupon['cart_discount'],

            'coupon_code'=>$this->coupon['coupon_code'],

            'coupon_start_date'=>$this->coupon['coupon_start_date'],

            'coupon_expiry_date'=>$this->coupon['coupon_expiry_date'],

            'coupon_usages_limit'=>$this->coupon['coupon_usages_limit'],

            'minimum_purchase_limit'=>$this->coupon['minimum_purchase_limit'],

            'description'=>$this->coupon['description'],
            
        ];

        //Log::info('User failed to login1111.'.print_r($this->user,1));
        //Log::info('User failed to login.'.print_r($couponArr,1));


         Mail::to($couponArr['email'])->send(new SendCoupon($couponArr));
    }
}

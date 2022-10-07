<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public $orderProduct;

    public $orderStatus;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $order, Array $orderProduct, Array $orderStatus)
    {
        
        $this->order=$order;

        $this->orderProduct=$orderProduct;

        $this->orderStatus=$orderStatus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.order_detail')->subject('Order Detail');
    }
}

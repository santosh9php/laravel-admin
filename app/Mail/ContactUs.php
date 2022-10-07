<?php
namespace App\Mail;
use Illuminate\Mail\Mailable;

class ContactUs extends Mailable
{

    public $contactUsMsg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $contactUsMsg)
    {
        //
        $this->contactUsMsg=$contactUsMsg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($address = $this->contactUsMsg->email,$name = $this->contactUsMsg->name)
                     ->subject('Contact Us')->view('email.contactUs');
    }
}

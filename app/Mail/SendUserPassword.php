<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class SendUserPassword extends Mailable
{
    use Queueable, SerializesModels;



    /**
     * Elements de contact
     * @var array
     */
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('testdevcode101@perfmindset.com')
                    ->subject('CODE 101 - Confirmation du compte')
                    ->view('emails.sendpassword');
    }
}

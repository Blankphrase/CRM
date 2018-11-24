<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Meeting extends Mailable
{
    use Queueable, SerializesModels;
    public  $user,$request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    const request='';

    public function __construct($user,$request)
    {
        //
        $this->user=$user;
        $this->request=$request->all();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function meets()
    {
        return $this->view('email.meeting');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteMail extends Mailable
{
    use Queueable, SerializesModels;
    public  $user,$request,$api_token;

    
    const request='';

    public function __construct($user,$request,$api_token)
    {
        //
        $this->user=$user;
        $this->request=$request;
        $this->api_token=$api_token;
    }

    
    public function invites()
    {
        return $this->view('email.staff');
    }
}

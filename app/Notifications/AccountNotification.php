<?php
namespace App\Notifications;

use App\Account;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Channels\MailChannel;

class AccountMailChannel
{
    protected $mailChannel;

    public function __construct(MailChannel $mailChannel)
    {
        $this->mailChannel = $mailChannel;
    }

    public function send(Account $account, Notification $notification)
    {
        foreach ($account->users as $user) {
            $this->mailChannel->send($user, $notification);
        }

    }
}


class AccountNotification
{
    public function via($notifiable)
    {
        return [AccountMailChannel::class];
    }
    
     
    public function toMail($notifiable)
    {
        return new MailMessage;   
    }

}

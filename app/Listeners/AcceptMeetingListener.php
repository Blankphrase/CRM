<?php

namespace App\Listeners;

use App\Events\AcceptMeetingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptMeetingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AcceptMeetingEvent  $event
     * @return void
     */
    public function handle(AcceptMeetingEvent $event)
    {
        //
    }
}
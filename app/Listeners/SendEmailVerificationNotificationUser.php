<?php

namespace App\Listeners;

use App\Providers\RegisteredUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailVerificationNotificationUser
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
     * @param  \App\Providers\RegisteredUser  $event
     * @return void
     */
    public function handle(RegisteredUser $event)
    {
        echo 'saman salam event';
    }
}

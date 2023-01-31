<?php

namespace App\Listeners;

use App\Events\CreateNewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ShowNewUserNotif
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
     * @param  \App\Events\CreateNewUser  $event
     * @return void
     */
    public function handle(CreateNewUser $event)
    {
        echo 'saman';
    }
}

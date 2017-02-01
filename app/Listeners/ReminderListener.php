<?php

namespace App\Listeners;

use App\Events\Reminder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReminderListener
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
     * @param  Reminder  $event
     * @return void
     */
    public function handle(Reminder $event)
    {
        //
    }
}

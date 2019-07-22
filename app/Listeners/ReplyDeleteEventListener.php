<?php

namespace App\Listeners;

use App\Events\ReplyDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyDeleteEventListener
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
     * @param  ReplyDeleteEvent  $event
     * @return void
     */
    public function handle(ReplyDeleteEvent $event)
    {
        //
    }
}

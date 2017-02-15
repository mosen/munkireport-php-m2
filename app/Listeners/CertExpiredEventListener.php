<?php

namespace Mr\Listeners;

use MrModule\Certificate\Events\CertExpiredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CertExpiredEventListener
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
     * @param  CertExpiredEvent  $event
     * @return void
     */
    public function handle(CertExpiredEvent $event)
    {
        //
    }
}

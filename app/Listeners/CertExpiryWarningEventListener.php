<?php

namespace Mr\Listeners;

use MrModule\Certificate\Events\CertExpiryWarningEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CertExpiryWarningEventListener
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
     * @param  CertExpiryWarningEvent  $event
     * @return void
     */
    public function handle(CertExpiryWarningEvent $event)
    {
        //
    }
}

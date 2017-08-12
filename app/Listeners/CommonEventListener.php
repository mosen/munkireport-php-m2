<?php

namespace Mr\Listeners;

use Mr\Event;
use Mr\Events\NewClientEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommonEventListener
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
     * @param  NewClientEvent  $event
     * @return void
     */
    public function handle(NewClientEvent $event)
    {
        $model = new Event;
        $model->msg = NewClientEvent::$msg;
        $model->type = 'info';
        $model->module = 'reportdata';
        $model->serial_number = $event->serialNumber;

        $model->save();
    }
}

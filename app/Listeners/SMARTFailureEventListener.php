<?php

namespace Mr\Listeners;

use Mr\Event;
use MrModule\DiskReport\Events\SMARTFailureEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SMARTFailureEventListener
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
     * @param  SMARTFailureEvent  $event
     * @return void
     */
    public function handle(SMARTFailureEvent $event)
    {
        $model = new Event;
        $model->msg = SMARTFailureEvent::$msg;
        $model->type = 'danger';
        $model->module = 'event';
        $model->serial_number = $event->diskReport->serial_number;

        $model->save();
    }
}

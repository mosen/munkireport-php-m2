<?php

namespace Mr\Listeners;

use Mr\Event;
use MrModule\DiskReport\Events\LowFreeSpaceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LowFreeSpaceEventListener
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
     * @param  LowFreeSpaceEvent  $event
     * @return void
     */
    public function handle(LowFreeSpaceEvent $event)
    {
        $model = new Event;
        $model->msg = LowFreeSpaceEvent::$msg;
        $model->type = $event->severity;
        // TODO: the value of 'gb' actually needs to be the threshold that was crossed
        //$model->data = json_encode(array('gb'=> $event->diskReport->FreeSpace))
        $model->module = 'event';
        $model->serial_number = $event->diskReport->serial_number;

        $model->save();
    }
}

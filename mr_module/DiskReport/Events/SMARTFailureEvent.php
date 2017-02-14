<?php

namespace MrModule\DiskReport\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use MrModule\DiskReport\DiskReport;

class SMARTFailureEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string The message that would be written to `event` in MR2
     */
    public static $msg = 'smartstatus_failing';

    public $diskReport;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DiskReport $diskReport)
    {
        $this->diskReport = $diskReport;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

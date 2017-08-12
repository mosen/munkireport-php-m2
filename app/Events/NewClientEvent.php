<?php

namespace Mr\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewClientEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string The message that would be written to `event` in MR2
     */
    public static $msg = 'new_client';

    public $serialNumber;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }
}

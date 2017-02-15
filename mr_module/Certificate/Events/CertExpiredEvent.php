<?php

namespace MrModule\Certificate\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use MrModule\Certificate\Certificate;

class CertExpiredEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $certificate;

    public $severity;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Certificate $certificate, $severity)
    {
        $this->certificate = $certificate;
        $this->severity = $severity;
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

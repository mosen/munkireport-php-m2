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

class LowFreeSpaceEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string The message that would be written to `event` in MR2
     */
    public static $msg = 'free_disk_space_less_than';

    public $diskReport;
    public $severity; // 'warning' or 'danger'

    /**
     * Create a new event instance.
     *
     * @param DiskReport $diskReport
     * @param $severity
     */
    public function __construct(DiskReport $diskReport, $severity)
    {
        $this->diskReport = $diskReport;
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

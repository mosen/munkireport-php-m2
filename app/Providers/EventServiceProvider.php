<?php

namespace Mr\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'MrModule\DiskReport\Events\SMARTFailureEvent' => [
            'Mr\Listeners\SMARTFailureEventListener'
        ],
        'MrModule\DiskReport\Events\LowFreeSpaceEvent' => [
            'Mr\Listeners\LowFreeSpaceEventListener'
        ],
        'MrModule\Certificate\Events\CertExpiredEvent' => [
            'Mr\Listeners\CertExpiredEventListener'
        ],
        'MrModule\Certificate\Events\CertExpiryWarningEvent' => [
            'Mr\Listeners\CertExpiryWarningEventListener'
        ],
        'Mr\Events\NewClientEvent' => [
            'Mr\Listeners\CommonEventListener'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

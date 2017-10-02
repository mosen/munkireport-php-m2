<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Checkin Providers
    |--------------------------------------------------------------------------
    |
    | This hash describes the Check-in provider to instantiate to handle the given
    | key in the result set.
    */

    'checkin' => [
        'ard' => \MrModule\ARD\CheckInHandler::class,
        'bluetooth' => \MrModule\Bluetooth\CheckInHandler::class,
        'certificate' => \MrModule\Certificate\CheckInHandler::class,
        'directory_service' => \MrModule\DirectoryService\CheckInHandler::class,
        'disk_report' => \MrModule\DiskReport\CheckInHandler::class,
        'displays_info' => \MrModule\Display\CheckInHandler::class,
        'filevault_status' => \MrModule\FileVaultStatus\CheckInHandler::class,
        'findmymac' => \MrModule\FindMyMac\CheckInHandler::class,
        'installhistory' => \MrModule\InstallHistory\CheckInHandler::class,
        'inventory' => \MrModule\Inventory\CheckInHandler::class,
        'localadmin' => \MrModule\LocalAdmin\CheckInHandler::class,
        'location' => \MrModule\Location\CheckInHandler::class,
        'managedinstalls' => \MrModule\ManagedInstalls\CheckInHandler::class,
        'munkiinfo' => \MrModule\MunkiInfo\CheckInHandler::class,
        'munkireport' => \MrModule\MunkiReport\CheckInHandler::class,
        'network' => \MrModule\Network\CheckInHandler::class,
        'power' => \MrModule\Power\CheckInHandler::class,
        'printer' => \MrModule\Printer\CheckInHandler::class,
        'profile' => \MrModule\Profile\CheckInHandler::class,
        'security' => \MrModule\Security\CheckInHandler::class,
        'timemachine' => \MrModule\TimeMachine\CheckInHandler::class,
        'warranty' => \MrModule\Warranty\CheckInHandler::class,
        'wifi' => \MrModule\Wifi\CheckInHandler::class,
    ]
];
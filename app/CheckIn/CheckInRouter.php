<?php
namespace Mr\CheckIn;

use Illuminate\Support\Facades\Log;
use Mr\Contracts\CheckIn\CheckInRouter as CheckInRouterInterface;
use CFPropertyList\CFPropertyList;

/**
 * The CheckInRouter class examines each section of a check in request and passes off data structures to modules
 * that have registered to receive that information.
 * 
 * @package Mr\CheckIn
 */
class CheckInRouter implements CheckInRouterInterface
{
    /**
     * @var array
     */
    protected $handlers = [
        'machine' => [
            'Mr\\CheckIn\\MachineCheckInHandler'
        ],
        'reportdata' => [
            'Mr\\CheckIn\\ReportDataCheckInHandler'
        ],
        'warranty' => [
            'MrModule\\Warranty\\CheckInHandler'
        ],
        'installhistory' => [
            'MrModule\\InstallHistory\\CheckInHandler'
        ],
        'network' => [
            'MrModule\\Network\\CheckInHandler'
        ],
        'disk_report' => [
            'MrModule\\DiskReport\\CheckInHandler'
        ],
        'bluetooth' => [
            'MrModule\\Bluetooth\\CheckInHandler'
        ],
        'ard' => [
            'MrModule\\ARD\\CheckInHandler'
        ],
        'munkireport' => [
            'MrModule\\MunkiReport\\CheckInHandler'
        ],
        'directory_service' => [
            'MrModule\\DirectoryService\\CheckInHandler'
        ],
        'displays_info' => [
            'MrModule\\Display\\CheckInHandler'
        ],
        'printer' => [
            'MrModule\\Printer\\CheckInHandler'
        ],
        'profile' => [
            'MrModule\\Profile\\CheckInHandler'
        ],
        'certificate' => [
            'MrModule\\Certificate\\CheckInHandler'
        ],
        'security' => [
            'MrModule\\Security\\CheckInHandler'
        ],
        'wifi' => [
            'MrModule\\Wifi\\CheckInHandler'
        ],
        'munkiinfo' => [
            'MrModule\\MunkiInfo\\CheckInHandler'
        ],
        'power' => [
            'MrModule\\Power\\CheckInHandler'
        ],
        'localadmin' => [
            'MrModule\\LocalAdmin\\CheckInHandler'
        ],
        'timemachine' => [
            'MrModule\\TimeMachine\\CheckInHandler'
        ],
        'findmymac' => [
            'MrModule\\FindMyMac\\CheckInHandler'
        ],
        'managedinstalls' => [
            'MrModule\\ManagedInstalls\\CheckInHandler'
        ]
    ];

    /**
     * Register a CheckIn Handler
     *
     * @todo The instance var handlers isn't being persisted across service providers.
     * @param $moduleName
     * @param $className
     * @return null
     */
    public function addHandler($moduleName, $className)
    {
        Log::debug("Registering handler {$className} for {$moduleName}");
        if (!isset($this->handlers[$moduleName])) {
            $this->handlers[$moduleName] = [$className];
        } else {
            $this->handlers[$moduleName][] = $className;
        }
    }

    /**
     * Call all CheckInHandlers associated with the given moduleName
     *
     * @param $moduleName string The name of the module data to handle.
     * @param $data array A hash of data from that module
     * @return boolean False if route was not handled by any module.
     */
    public function route($moduleName, $serialNumber, $data) {
        Log::debug("Routing check in for {$moduleName}");

        if (isset($this->handlers[$moduleName])) {
            foreach ($this->handlers[$moduleName] as $h) {
                $cls = app($h);
                Log::debug("Executing check-in handler ${h}");
                $cls->process($moduleName, $serialNumber, $data);
            }
            return true;
        }

        Log::debug("No check-in handlers registered for module name: ${moduleName}");

        return false;
    }
}
<?php
namespace Mr\CheckIn;

use Illuminate\Support\Facades\Log;
use Mr\Contracts\CheckIn\Router as CheckInRouterInterface;
use CFPropertyList\CFPropertyList;

/**
 * The CheckInRouter class examines each section of a check in request and passes off data structures to modules
 * that have registered to receive that information.
 * 
 * @package Mr\CheckIn
 */
class Router implements CheckInRouterInterface
{
    /**
     * @var array
     */
    protected $handlers = [
        'machine' => [
            'MrModule\\Machine\\CheckInHandler'
        ],
        'reportdata' => [
            'Mr\\CheckIn\\ReportDataCheckInHandler'
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
    public function handle($moduleName, $className)
    {
        Log::debug("Registering handler ${className} for ${moduleName}");
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
        if (isset($this->handlers[$moduleName])) {
            $dataObj = new CFPropertyList;
            $dataObj->parse($data);
            $dataArr = $dataObj->toArray();

            foreach ($this->handlers[$moduleName] as $h) {
                $cls = app($h);
                Log::debug("Executing check-in handler ${h}");
                $cls->process($moduleName, $serialNumber, $dataArr);
            }
            return true;
        }

        Log::debug("No check-in handlers registered for module name: ${moduleName}");

        return false;
    }
}
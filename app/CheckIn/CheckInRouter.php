<?php
namespace Mr\CheckIn;

use Illuminate\Support\Facades\Log;
use Mr\Contracts\CheckIn\CheckInRouter as CheckInRouterInterface;

/**
 * The CheckInRouter class examines each section of a check in request and passes off data structures to modules
 * that have registered to receive that information.
 * 
 * @package Mr\CheckIn
 */
class CheckInRouter implements CheckInRouterInterface
{
    protected $handlers = [];

    /**
     * CheckInRouter constructor.
     * @param array $handlers An array of objects implementing the CheckIn\Handler interface.
     */
    public function __construct(array $handlers) {
        foreach ($handlers as $handlerClass) {
            Log::debug(implode(',', $handlerClass::$handles));
            if (!empty($handlerClass::$handles)) {
                foreach ($handlerClass::$handles as $k) {
                    $this->handlers[$k] = [$handlerClass];
                }
            }
        }
    }

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
        Log::debug("Have handlers for: " . implode(',', array_keys($this->handlers)));

        if (isset($this->handlers[$moduleName])) {
            foreach ($this->handlers[$moduleName] as $h) {
                Log::debug("Executing check-in handler ${moduleName}");
                $h->process($moduleName, $serialNumber, $data);
            }
            return true;
        }

        Log::debug("No check-in handlers registered for module name: ${moduleName}");

        return false;
    }
}
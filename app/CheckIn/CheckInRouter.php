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
     * @param array $handlers A hash where the key equals a key in the result set, and the value is the name of the class
     *  to instantiate to handle that key.
     */
    public function __construct(array $handlers)
    {
        $this->handlers = $handlers;
    }

    /**
     * Call all CheckInHandlers associated with the given moduleName
     *
     * @param $moduleName string The name of the module data to handle.
     * @param $serialNumber string The client serial number.
     * @param $data array A hash of data from that module
     *
     * @return bool False if route was not handled by any module.
     */
    public function route($moduleName, $serialNumber, $data)
    {
        Log::debug("Routing check in for {$moduleName}");
        Log::debug("Have handlers for: " . implode(',', array_keys($this->handlers)));

        if (isset($this->handlers[$moduleName])) {
            $handlerClass = $this->handlers[$moduleName];
            $handler = new $handlerClass;

            Log::debug("Executing check-in handler ${moduleName}");
            $handler->process($moduleName, $serialNumber, $data);

            return true;
        }

        Log::debug("No check-in handlers registered for module name: ${moduleName}");

        return false;
    }
}
<?php
namespace Mr\CheckIn;

/**
 * The CheckInRouter class examines each section of a check in request and passes off data structures to modules
 * that have registered to receive that information.
 * 
 * @package Mr\CheckIn
 */
class CheckInRouter
{
    /**
     * @var array
     */
    protected $handlers = [];

    /**
     * Register a CheckIn Handler
     *
     * @param $moduleName
     * @param $className
     */
    public function handle($moduleName, $className)
    {
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
    public function route($moduleName, $data) {
        throw new \Exception(count($this->handlers));

        if (isset($this->handlers[$moduleName])) {
            foreach ($this->handlers[$moduleName] as $h) {
                $h->process($moduleName, $data);
            }
            return true;
        }
        return false;
    }
}
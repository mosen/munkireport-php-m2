<?php
namespace MrModule\Machine;

use Mr\Contracts\CheckIn\CheckInHandler as CheckInHandlerContract;

class CheckInHandler implements CheckInHandlerContract
{
    public function process($moduleName, $data)
    {
        throw new \Exception('shazam');
    }

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'machine';
    }
}
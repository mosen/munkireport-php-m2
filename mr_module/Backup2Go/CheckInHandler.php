<?php
namespace MrModule\Backup2Go;


use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        // TODO: process()
    }
}
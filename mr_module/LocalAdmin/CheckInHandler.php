<?php
namespace MrModule\LocalAdmin;

use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    public static $handles = ['localadmin'];

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        $la = LocalAdmin::firstOrNew(['serial_number' => $serialNumber]);
        $la->serial_number = $serialNumber;
        $la->users = trim($data);
        $la->save();
    }
}
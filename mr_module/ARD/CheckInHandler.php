<?php
namespace MrModule\ARD;


use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'ard';
    }

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        $ard = ARDInfo::firstOrNew(['serial_number' => $serialNumber]);
        $ard->serial_number = $serialNumber;
        $ard->Text1 = $data['Text1'];
        $ard->Text2 = $data['Text2'];
        $ard->Text3 = $data['Text3'];
        $ard->Text4 = $data['Text4'];
        $ard->save();
    }
}
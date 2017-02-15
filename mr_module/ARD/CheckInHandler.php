<?php
namespace MrModule\ARD;

use CFPropertyList\CFPropertyList;
use Illuminate\Support\Arr;
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
        $dataObj = new CFPropertyList;
        $dataObj->parse($data);
        $dataArr = $dataObj->toArray();

        $ard = ARDInfo::firstOrNew(['serial_number' => $serialNumber]);
        $ard->serial_number = $serialNumber;
        $ard->Text1 = Arr::get($dataArr, 'Text1', $ard->Text1);
        $ard->Text2 = Arr::get($dataArr, 'Text2', $ard->Text2);
        $ard->Text3 = Arr::get($dataArr, 'Text3', $ard->Text3);
        $ard->Text4 = Arr::get($dataArr, 'Text4', $ard->Text4);
        $ard->save();
    }
}
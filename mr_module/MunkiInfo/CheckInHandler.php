<?php
namespace MrModule\MunkiInfo;


use CFPropertyList\CFPropertyList;
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
        return $moduleName == 'munkiinfo';
    }

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed|void
     */
    public function process($moduleName, $serialNumber, $data)
    {
        $dataObj = new CFPropertyList;
        $dataObj->parse($data);
        $dataArr = $dataObj->toArray();
        $dataArr = $dataArr[0]; // For some reason this is encapsulated in another array

        MunkiInfo::where(['serial_number' => $serialNumber])->delete();

        foreach ($dataArr as $key => $val) {
            $mi = new MunkiInfo;
            $mi->serial_number = $serialNumber;
            $mi->munkiinfo_key = $key;
            $mi->munkiinfo_value = $val;

            $mi->save();
        }
    }
}
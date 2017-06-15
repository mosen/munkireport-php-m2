<?php
namespace MrModule\Bluetooth;

use CFPropertyList\CFPropertyList;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    public static $handles = ['bluetooth'];

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

        BluetoothInfo::where('serial_number', $serialNumber)->delete();

        foreach ($dataArr as $key => $value) {
            $bt = new BluetoothInfo;
            $bt->serial_number = $serialNumber;
            $bt->device_type = strtolower($key);
            $bt->battery_percent = $value;

            $bt->save();
        }
    }
}
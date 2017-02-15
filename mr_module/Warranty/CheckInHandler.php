<?php
namespace MrModule\Warranty;

use CFPropertyList\CFPropertyList;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    protected $dontCheck = [
        "Can't lookup warranty",
        "Expired",
        "Virtual Machine"
    ];

    protected function check(Warranty $warranty)
    {
        $previousStatus = $warranty->status;

        // warranty_helper
    }

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'warranty';
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

        $warranty = Warranty::firstOrNew(['serial_number' => $serialNumber]);
        $warranty->serial_number = $serialNumber;

        // TODO: not actually implemented

        $warranty->fill($dataArr);
        $warranty->save();
    }
}
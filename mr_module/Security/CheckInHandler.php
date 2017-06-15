<?php
namespace MrModule\Security;


use CFPropertyList\CFPropertyList;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    public static $handles = ['security'];

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

        $sec = Security::firstOrNew(['serial_number' => $serialNumber]);
        $sec->gatekeeper = $dataArr['gatekeeper'];
        $sec->sip = $dataArr['sip'];
        $sec->save();
    }
}
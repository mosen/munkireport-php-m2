<?php
namespace Mr\CheckIn;

use CFPropertyList\CFPropertyList;
use Mr\Contracts\CheckIn\Handler;
use Mr\ReportData;

class ReportDataCheckInHandler implements Handler
{
    public static $handles = ['reportdata'];

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

        $rdata = ReportData::firstOrNew(['serial_number' => $serialNumber]);
        $rdata->serial_number = $serialNumber;

        $rdata->fill($dataArr);
        $rdata->save();
    }
}